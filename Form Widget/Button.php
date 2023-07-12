<?php

class Button extends HtmlElement
{

    public function __construct(protected string $text)
    {
    }

    public function render():string
    {
        return sprintf('<div>
                                <button type="submit"> %s </button>
                               </div>',$this->text);
    }
}