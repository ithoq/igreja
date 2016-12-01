<?php

/*
|--------------------------------------------------------------------------
| Model Factories |||| factory(App\Models\Admin\MembrosModel::class)->make()
|--------------------------------------------------------------------------
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

// FAKE dado da tabela MEMBROS
$factory->define(App\Models\Admin\MembrosModel::class, function (Faker\Generator $faker) {
	$faker->addProvider(Faker\Provider\pt_BR\Person::GENDER_MALE);
    return [
	    'mem_status' => $faker->randomElement(['Ativo','Inativo','Afastado']),
	    'mem_nome' => $faker->name,
	    'mem_sexo' => $faker->randomElement(['M','F']),
	    'mem_nascimento' => $faker->date('Y-m-d'),
	    'mem_estado_civil' => $faker->randomElement(['Casado','Solteiro','Divorciado','Viúvo','Desquitado','Amasiado','Separado']),
	    'mem_nome_conjuge' => $faker->firstNameMale,
	    'mem_cep_endereco' => $faker->postcode,
	    'mem_endereco' => $faker->streetAddress,
	    'mem_numero_endereco' => $faker->randomNumber(),
	    'mem_cidade_endereco' => $faker->city,
	    'mem_estado_endereco' => $faker->country,
	    'mem_cpf' => $faker->creditCardNumber,
	    'mem_rg' => $faker->creditCardNumber,
	    'mem_tel_celular' => $faker->phoneNumber,
	    'mem_tel_residencia' => $faker->phoneNumber,
	    'mem_email' => $faker->email,
	    'mem_apelido' => $faker->userName,
	    'mem_nome_pai' => $faker->firstNameMale,
	    'mem_nome_mae' => $faker->firstNameFemale,
	    'mem_nome_empresa' => $faker->company,
	    'mem_tel_empresa' => $faker->phoneNumber,
	    'mem_profissao' => $faker->jobTitle,
	    'mem_cargo' => $faker->jobTitle,
	    'mem_data_batismos' => $faker->date('Y-m-d'),
	    'mem_foto' => ' ',
	    'user_id' => $faker->numberBetween(1,2),
    ];
});
