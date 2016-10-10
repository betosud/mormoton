<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return $this->showRegistrationForm();
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
        }

        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        return $this->register($request);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

//        Auth::guard($this->getGuard())->login($this->create($request->all()));
        $resp=$this->create($request->all());


        if($resp) {
            $response = Password::sendResetLink($request->only('email'), function (Message $message) {
                $message->subject("Bienvenido a Mormoton");
            });



            switch ($response) {
                case  Password::RESET_LINK_SENT: {
                    \Session::flash('message','Se te a enviado un correo para establecer tu contraseña y poder ingresar');
                    return redirect('/');
                }
                case Password::INVALID_USER: {
//                    \Session::flash('message','Se te a enviado un correo para establecer tu contraseña y poder ingresar');
                    return redirect('/');
                }
            }
        }




        return redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return string|null
     */
    protected function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }
}
