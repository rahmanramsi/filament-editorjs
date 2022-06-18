<?php

namespace FilamentEditorJs\Forms\Components\Concerns;

use Closure;

trait InteractsWithTools
{
  public function disableAllTools(bool $condition = true): static
  {
    if ($condition) {
      $this->tools = [];
    }

    return $this;
  }

  public function disableTools(array $toolsToDisable = []): static
  {
    $this->tools = collect($this->getTools())
      ->filter(static fn ($button) => !in_array($button, $toolsToDisable))
      ->toArray();

    return $this;
  }

  public function enableTools(array $toolsToEnable = []): static
  {
    $this->tools = array_merge($this->getTools(), $toolsToEnable);

    return $this;
  }

  public function tools(array | Closure $tools = []): static
  {
    $this->tools = $tools;

    return $this;
  }

  public function getTools(): array
  {
    return $this->evaluate($this->tools);
  }

  public function hasTools(string | array $button): bool
  {
    if (is_array($button)) {
      $tools = $button;

      return (bool) count(array_intersect($tools, $this->getTools()));
    }

    return in_array($button, $this->getTools());
  }
}
