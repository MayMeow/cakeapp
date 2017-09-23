<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'username' => 'martin',
                'password' => '$2y$10$Hf/rY5prI6TIVOTiwZAD5.fNAoPAv.h4B3Qami/329iJnM4.YDQdO',
                'role' => 'admin',
                'verified' => '1',
                'created' => '2017-06-05 14:50:42',
                'modified' => '2017-07-19 10:10:17',
                'uid' => 'cdbcfb14-ea76-4bb7-b348-10dda7116285',
                'email' => 'martinkukolos@outlook.com',
                'password_reset' => NULL,
                'image' => 'W:\\GitLab\\maymeow-cloud\\data\\users-data\\users\\images\\2018cbd9-beab-44cf-8886-9357d69aed76.png',
                'two_fa_secret' => NULL,
            ],
            [
                'id' => '2',
                'username' => 'katka',
                'password' => '$2y$10$NTbAJKNjVEoYCXImkVaY4.kIVueylAJNy4dW5QcMMtuH4v6bra3NW',
                'role' => 'admin',
                'verified' => '1',
                'created' => '2017-07-04 06:53:06',
                'modified' => '2017-07-18 19:35:33',
                'uid' => '985a344e-6273-401e-9dbd-1f39effa5fd0',
                'email' => 'katka@cakehub.sk',
                'password_reset' => NULL,
                'image' => NULL,
                'two_fa_secret' => NULL,
            ],
            [
                'id' => '3',
                'username' => 'majka',
                'password' => '$2y$10$oThGUMDBCXYQ68ZbGhQ8CeS9DZ0QykUMc3dJrF60wSY71SzEmyo5m',
                'role' => 'user',
                'verified' => '1',
                'created' => '2017-07-19 17:39:21',
                'modified' => '2017-07-19 17:39:21',
                'uid' => '1782191d-a679-45c0-980b-439cc4185466',
                'email' => 'mataw@outlook.sk',
                'password_reset' => NULL,
                'image' => NULL,
                'two_fa_secret' => NULL,
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
