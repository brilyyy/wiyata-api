<?php

namespace App\Http\Controllers;

use App\Mail\VerifyUser;
use App\Models\EmailVerifyToken;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    use ApiResponser;

    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->jsonResponse(400, 'Data gagal divalidasi', $validator->errors());
        }

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (!Hash::check($request->password, $user->password)) {
                return $this->jsonResponse(401, 'Maaf, password anda salah.
                Silakan coba lagi');
            }
        }

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);

        if (Auth::check()) {
            $user = Auth::user();
            $user->access_token = $user->createToken('wiyata-id')->accessToken;
            return $this->jsonResponse(200, 'Berhasil Login', $user);
        } else {
            return $this->jsonResponse(401, 'Akun anda belum terdaftar');
        }
    }

    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed|min:8',
            'agreement'             => 'required'
        ];

        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password',
            'password.min'          => 'Password harus lebih dari 8 karakter',
            'agreement.required'    => 'Anda harus menyetujui Terms of Service',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->jsonResponse(400, 'Data gagal divalidasi', $validator->errors());
        }

        $user = new User();
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->avatar = 'https://ui-avatars.com/api/?name=' . str_replace(" ", "+", $request->name);
        $save = $user->save();
        $user->syncRoles('Student');

        if ($save) {
            return $this->jsonResponse(201, 'Sukses registrasi, silakan login', $user);
        } else {
            return $this->jsonResponse(400, 'Gagal registrasi');
        }
    }

    public function sendVerification()
    {
        $user = Auth::user();
        if (!$user->email_verified_at) {
            $token = Str::random(64);
            EmailVerifyToken::create([
                'token' => $token,
                'user_id' => $user->id
            ]);
            Mail::to($user->email)->send(new VerifyUser($user));
            return $this->jsonResponse(200, 'Verifikasi Email terkirim');
        }
    }

    public function verifyEmail($token)
    {
        $verified = EmailVerifyToken::where('token', $token)->first();
        if ($verified) {
            $user = $verified->user;
            $user->email_verified_at = Carbon::now();
            if ($user->save()) {
                return $this->jsonResponse(200, 'Email telah terverifikasi', $user);
            }
        } else {
            return $this->jsonResponse(400, 'Gagal verifikasi email');
        }
    }

    public function me()
    {
        return $this->jsonResponse(200, 'Data user sukses didapat', Auth::user());
    }
}
