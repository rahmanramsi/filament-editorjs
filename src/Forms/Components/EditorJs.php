<?php

namespace FilamentEditorJs\Forms\Components;

use Closure;
use Filament\Forms\Components\Concerns\HasFileAttachments;
use Filament\Forms\Components\Concerns\HasPlaceholder;
use Filament\Forms\Components\Contracts\HasFileAttachments as HasFileAttachmentsContract;
use Filament\Forms\Components\Field;
use FilamentEditorJs\Forms\Components\Concerns\InteractsWithTools;

class EditorJs extends Field implements HasFileAttachmentsContract
{
  use HasFileAttachments, HasPlaceholder, InteractsWithTools;

  protected string $view = 'filament-editorjs::forms.components.fields.editorjs';

  protected array | Closure $tools = [
    'header',
    'image',
    'delimiter',
    'list',
    'underline',
    'quote',
    'table',
    'raw',
    'code',
    'inline-code',
    'style',
  ];

  protected int | Closure | null $minHeight = 30;

  public function minHeight(int | Closure | null $minHeight): static
  {
      $this->minHeight = $minHeight;

      return $this;
  }

  public function getMinHeight(): ?int
  {
      return $this->evaluate($this->minHeight);
  }
}
