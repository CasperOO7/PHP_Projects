<?php

class Form extends HtmlElement
{
    /**
     * @var  HtmlElement[]
     */
    protected array $elements=[];
    public function __construct(protected string $action='', protected string $method='get')
    {

    }


    public function AddElement(HtmlElement $El):void
    {
        $this->elements[]=$El;
    }
    public function render(): string
    {
        $content=implode(PHP_EOL,array_map(fn($el)=>$el->render(),$this->elements));
        return sprintf('<form action="%s" method="%s">%s</form>',$this->action,$this->method,$content);

    }


}