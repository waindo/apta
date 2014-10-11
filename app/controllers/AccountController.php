<?php
class AccountController extends BaseController {
	public function getLogin() {
		return View::make('account.login');

	}
	public function postLogin() {
		$validator = Validator::make(Input::all(),
			array(
				'email' => 'required|email',
				'password' => 'required'
			));
			if($validator->fails()){
				return Redirect::route('account-login')
				->withErrors($validator)
				->withInput();
			} else {
				

				$auth = Auth::attempt(array(
					'email' => Input::get('email'),
					'password' => Input::get('password'),
					'active' => 1 
					));
				if($auth) {
					return Redirect::intended('/');
				} else {
					return Redirect::route('account-login')
						->with('global','Gagal login, email/password salah coba lagi. Pastikan akun anda sudah teraktivasi..');
				}
			}

			return Redirect::route('account-login')
				->with('global','Gagal login');
		
	}

	public function getLogout() {
		Auth::logout();
		return Redirect::route('home');
	}
	public function getCreate() {

		return View::make('account.create');

	}

	public function postCreate() {
		$validator = Validator::make(Input::all(),
			array(
					'email' => 'required|max:50|email|unique:users',
					'username' => 'required|max:20|min:3|unique:users',
					'password' => 'required|min:6',
					'password2' => 'required|same:password'
				)
			);

		if($validator->fails()) {
			return Redirect::route('account-create')
					->withErrors($validator)
					->withInput();	

		} else {
			$email = Input::get('email');
			$username = Input::get('username');
			$password = Input::get('password');

			// Activation code
			$code = str_random(60);

			$user = User::create(array(
					'email' => $email,
					'username' => $username,
					'password' => Hash::make($password),
					'code' => $code,
					'active' => 0

				));

			if($user) {
				//send email
				Mail::send('emails.auth.activate',array('link' => URL::route('account-activate', $code),'username' => $username), function($message) use ($user) {
					$message->to($user->email, $user->username)->subject('Aktivasi Akun Anda');

				});

				return Redirect::route('home')
					->with('global', 'Akun anda telah dibuat! Silahkan cek email untuk aktivasi akun anda.');
			}

		}
	}

	public function getActivate($code) {
		$user = User::where('code','=',$code)->where('active','=',0);

		if($user->count()) {
			$user = $user->first();
			//update user to active state
			$user->active    = 1;
			$user->code      = '';

			if($user->save()) {
				return Redirect::route('home')
					->with('global','Selamat! Akun anda telah aktif, silahkan login.');
			}
		}

		return Redirect::route('home')
				->with('global','Kami tidak bisa mengaktifkan akun anda cobalah beberapa saat lagi.');

		}

	
}