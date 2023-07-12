<?php

class TextInput extends BaseInput
{



    public function renderInput():string
    {
        return sprintf('<div>
                                <input type="text" name="%s" value="%s">
                               </div>',$this->name,$this->value);
    }
}