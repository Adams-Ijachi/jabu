<?php



test('Register screen can be rendered', function () {
    $response = $this->get(route('register'));

    $response->assertStatus(200);
});

test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('users can authenticate using the login screen', function () {
    $response = $this->post('/login', [
        'email' => user()->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('tasks'));
});

test('users can register ', function () {
    $response = $this->post('/login', [
        'name' => 'test',
        'email' => user()->email,
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);


    $this->assertDatabaseHas('users', [
        'email' => user()->email,
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('tasks'));
});

// test that validation works
test('users can not register with invalid password', function () {

    $response = $this->post('/register', [
        'name' => 'test',
        'email' => user()->email,
        'password' => 'password',
        'password_confirmation' => 'wrong-passwords',
    ]);

    $response->assertSessionHasErrors(
        [
            'email' => 'The email has already been taken.',
            'password' => 'The password field confirmation does not match.',
            'password_confirmation' => 'The password confirmation field must match password.',
        ]
    );
});


