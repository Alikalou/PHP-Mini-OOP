<?php
namespace App\Support;


/** Simple file logger to demonstrate serialization lifecycle. */
class FileLog
{
private string $filename;
private $fh = null; // resource|closed


public function __construct(string $filename)
{
$this->filename = $filename;
$this->open();
}


private function open(): void
{
$this->fh = fopen($this->filename, 'a');
if (!$this->fh) {
throw new \RuntimeException("Cannot open {$this->filename}");
}
}


public function write(string $note): void
{
fwrite($this->fh, $note . "\n");
}


public function __sleep(): array
{
if (is_resource($this->fh)) {
fclose($this->fh);
}
// Only persist filename; resource handles can’t be serialized
return ['filename'];
}


public function __wakeup(): void
{
$this->open();
}
}