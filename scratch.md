- [x] Add `wire:model` to inputs
- [x] Add `wire:submit="register"` to register modal
- [x] Convert `register-modal` to livewire
- [x] Add `name` `email` `password` properties
- [x] Add `register` action
- [x] Add validation

  ```php
  <?php
  $this->validate([
      'email' => ['required', 'lowercase', 'email', 'unique:'.User::class],
      'name' => ['required'],
      'password' => ['required'],
  ]);
  ```
- [x] Hash password
- [x] Create user
- [ ] Login user
- [ ] Redirect to home
  - with navigate
- [ ] Update welcome message on index page
  - show user name
- [ ] Add logout user item
  - use @auth directive
- [ ] Add `logout` action on click logout
- [ ] Convert to livewire component `user-menu`
- [ ] Add `logout` action

  ```php
  <?php

  Auth::guard('web')->logout();

  Session::invalidate();
  Session::regenerateToken();
  ```
- [ ] Redirect to home
- [ ] Add `wire:model` to login inputs
- [ ] Add `wire:submit="login"` on login modal
- [ ] Convert `login-modal` to livewire
- [ ] Add `email` `password` properties
- [ ] Add `login` action
- [ ] Validate input
- [ ] Add validation rules

  ```php
  <?php

  #[Validate(['required', 'email'])]
  public $email;

  #[Validate(['required'])]
  public $password;
  ```
- [ ] Try to authenticate user

  ```php
  <?php

  if (! Auth::attempt($this->only(['email', 'password']), true)) {
      throw ValidationException::withMessages([
          'email' => trans('auth.failed'),
      ]);
  }
  ```
- [ ] Extranct to `authenticate` method
- [ ] Regenerate session
- [ ] Redirect intented and fallback to home
- [ ] Show validation errors
