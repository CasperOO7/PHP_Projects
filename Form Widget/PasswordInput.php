<?php

class PasswordInput extends BaseInput
{

    public function renderInput():string
    {
        return sprintf('<div>
                                <input type="password" name="%s" value="%s">
                               </div>',$this->name,$this->value);
    }
}