<?php

namespace Redbastie\LaravelLivewireHelpers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

trait CreatesStubs
{
    protected function createStubs($dir, $replaces = [])
    {
        $filesystem = new Filesystem;

        foreach ($filesystem->allFiles($dir) as $file) {
            $filePath = $this->replaceStubs($replaces, Str::replaceLast('.stub', '', $file->getRelativePathname()));
            $fileDir = $this->replaceStubs($replaces, $file->getRelativePath());

            if ($fileDir) {
                $filesystem->ensureDirectoryExists($fileDir);
            }

            $filesystem->put($filePath, $this->replaceStubs($replaces, $file->getContents()));

            $this->warn('Created file: <info>' . $filePath . '</info>');
        }
    }

    private function replaceStubs($replaces, $content)
    {
        return str_replace(array_keys($replaces), $replaces, $content);
    }
}
