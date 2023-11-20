<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|max:40|unique:users,email',
            'password' => 'required|min:6|max:40',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:720',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            
        ],[
            'name.required' => 'Nome é obrigatório.',
            'name.min' => 'Nome precisa ter no minimo 3 letras.',
            'name.max' => 'Nome precisa ter no maximo 40 letras.',
            'email.required' => 'Email é obrigatório.',
            'email.email' => 'Email inválido.',
            'email.max' => 'Limite de 40 caracteres atingido!.',
            'email.unique' => 'Este e-mail já está em uso. Por favor, escolha outro.',
            'password.required' => 'Senha obrigatória.',
            'password.min' => 'Senha com minima de 6 caracteres',
            'password.max' => 'Senha maxima de 40 caracteres.',
            'profile_picture.required' => 'Imagem de perfil é obrigatória!.',
            'profile_picture.image' => 'O arquivo precisa ser imagem: JPEG, PNG, JPG.',
            'profile_picture.mimes' => 'O arquivo precisa ser JPEG, PNG, JPG.',
            'profile_picture.max' => 'O arquivo precisa ter no maximo 720p.',
            'facebook.url' => 'Url inválida!',
            'twitter.url' => 'Url inválida!',
            'linkedin.url' => 'Url inválida!',
        ]);
        
        
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);  
        $user->facebook = null;
        $user->twitter = null;
        $user->linkedin = null;
        $user->about = null;

        if ($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {
            $requestImage = $request->profile_picture;
        
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . '_' . strtotime("now")) . '.' . $extension;
        
            $img = Image::make($requestImage->getRealPath());
            $img->fit(200, 200);
        
            // Salva a imagem redimensionada no diretório especificado
            $path = 'img/profile/' . $imageName;
            $img->save(public_path($path));
        
            // Atualiza apenas o nome do arquivo no campo profile_picture do modelo User
            $user->profile_picture = $imageName;
        }
    
        $user->save();

        return redirect('/')->with('success', 'Usuário cadastrado com sucesso!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user()->id;
        if(!$user){
            return redirect()->route('dashboard');
        }

        $userInfo = User::find($user)->get();

        return view('userProfile', compact('userInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user()->id;
        if(!$user){
            return redirect()->route('dashboard');
        }
        
        $userInfo = User::find($user)->get();

        return view('userEdit', compact('userInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|max:40',
            'profile_picture' => 'image|mimes:jpeg,png,jpg|max:720',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            
        ],[
            'name.required' => 'Nome é obrigatório.',
            'name.min' => 'Nome precisa ter no minimo 3 letras.',
            'name.max' => 'Nome precisa ter no maximo 40 letras.',
            'email.required' => 'Email é obrigatório.',
            'email.email' => 'Email inválido.',
            'email.max' => 'Limite de 40 caracteres atingido!.',
            'profile_picture.image' => 'O arquivo precisa ser imagem: JPEG, PNG, JPG.',
            'profile_picture.mimes' => 'O arquivo precisa ser JPEG, PNG, JPG.',
            'profile_picture.max' => 'O arquivo precisa ter no maximo 720p.',
            'facebook.url' => 'Url inválida!',
            'twitter.url' => 'Url inválida!',
            'linkedin.url' => 'Url inválida!',
        ]);

        
        $user = User::find($id);

        $user->name = $request->name;
        
        if($request->password == null)
        {
            $user->password = $user->password;
        }
        else
        {
            $request->validate([
                'password' => 'min:6|max:40',
            ],[ 
                'password.min' => 'Senha com minima de 6 caracteres',
                 'password.max' => 'Senha maxima de 40 caracteres.',
            ]);

            $user->password = bcrypt($request->password);
        }
        
       
        if($request->profile_picture == null)
        {
            $user->profile_picture = $user->profile_picture;
        }
        else
        {
            if ($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {
                $requestImage = $request->profile_picture;
            
                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName() . '_' . strtotime("now")) . '.' . $extension;
            
                $img = Image::make($requestImage->getRealPath());
                $img->fit(200, 200);
            
                // Salva a imagem redimensionada no diretório especificado
                $path = 'img/profile/' . $imageName;
                $img->save(public_path($path));
            
                // Atualiza apenas o nome do arquivo no campo profile_picture 
                $user->profile_picture = $imageName;
            }
        }
        
        $user->facebook = $request->facebook;
        $user->twitter = $request->twitter;
        $user->linkedin = $request->linkedin;
        $user->about = $request->about;
        
        if($request->email != $user->email)
            {
                $request->validate([
                    'email' => 'required|email|unique:users,email|max:40',
                ],[ 
                    'email.unique' => 'Este e-mail já está em uso. Por favor, escolha outro.',
                    'email.max' => 'Limite máximo de 40 caracteres atingido.',
                ]);
                
                return redirect('user/edit/{id}')->with('danger', 'Falha ao salvar, email já em uso!');
            }
            else
            {
                $user->update();
                return redirect('user/edit/{id}')->with('success', 'Dados alterados com sucesso!');
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cadastrar()
    {
        return view('cadastro');
    }
}
