<?php

namespace Rahmanramsi\FilamentEditorJs\Forms\Components;

use Closure;
use Filament\Forms\Components\Concerns\HasFileAttachments;
use Filament\Forms\Components\Concerns\HasPlaceholder;
use Filament\Forms\Components\Contracts\HasFileAttachments as HasFileAttachmentsContract;
use Filament\Forms\Components\Field;
use Rahmanramsi\FilamentEditorJs\Forms\Components\Concerns\InteractsWithTools;

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
}
