<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;
/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            $data = Yii::$app->request->post('LoginForm');
            $hashPass = $this->getHash($data['password'], $user->password);

            if (!$hashPass) {
                $this->addError($attribute, 'Неверное имя или пароль.');
            }
        }
    }
    /**
     * Проверка пароля
     * @method getHash
     * @param  str  $password password post
     * @param  str  $hash hash пароля
     * @return bool
     */
    public function getHash ($password, $hash)
    {
        return password_verify($password, $hash);
    }
    /**
     * tempFunc
     * @method validatePassword2
     * @param  [type]            $password [description]
     * @return [type]                      [description]
     */
    public function validatePassword2($password)
    {
        return $this->password === Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        } else {
        }
        return false;
    }

    /**
     * Finds user by [[useremail]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByEmail($this->email);
        }

        return $this->_user;
    }
}
