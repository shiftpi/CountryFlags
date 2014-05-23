<?php
namespace ShiftpiCountryFlags\Service;

/**
 * Mime Type Service
 * @author Andreas Rutz <andreas.rutz@posteo.de>
 * @license MIT
 */
class MimeType
{
    public function determine($data)
    {
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        return $finfo->buffer($data);
    }
} 