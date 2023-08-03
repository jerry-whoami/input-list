<?php

namespace JerryWhoami\InputList\Forms;

use Closure;
use Filament\Forms\Components\Field;

class InputList extends Field
{
  protected string $view = 'input-list::input-list';

  protected array|Closure $options;
  protected string|Closure $icon = "heroicon-o-menu";

  public function icon(string|Closure $icon)
  {
    $this->icon = $icon;

    return $this;
  }

  public function options(array|Closure $options): self
  {
    $this->options = $options;

    return $this;
  }

  public function getIcon(): string
  {
    return $this->evaluate($this->icon);
  }

  public function getOptions(): array
  {
    return $this->evaluate($this->options);
  }
}
