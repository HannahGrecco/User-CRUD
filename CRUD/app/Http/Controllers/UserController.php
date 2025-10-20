<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
  public function login(Request $request)
{
    $incomingFields = $request->validate([
        'loginname' => ['required'],
        'loginpassword' => ['required']
    ]);

    if (auth()->attempt([
        'name' => $incomingFields['loginname'],
        'password' => $incomingFields['loginpassword']
    ])) {
        $request->session()->regenerate();
        return redirect('/');
    }

    // se falhar, volta com erro
    return back()->withErrors(['loginname' => 'Nome ou senha incorretos']);
}

    //função LOGOUT - encerrando a sessão do usuário
    public function logout (){
        auth()->logout();
        return redirect('/');
    }

    //função para REGISTRAR os dados do usuário - requerindo nome, email e senha por meio de request validate
    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3','max:10', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8']
        ]);
        //criptografando a senha
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        //criando usuário e logando automaticamente
       $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');
    }
}
