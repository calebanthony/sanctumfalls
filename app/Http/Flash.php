<?php

namespace App\Http;

class Flash
{
    /**
     * Create a generic flash message that can be used by specific methods.
     * @param  string $title   The title of the message.
     * @param  string $message The main body of the message.
     * @param  string $level   What symbol should be shown. ['info', 'success', 'error']
     * @param  string $key     An alternate key, specific for doing overlays or other types of messages.
     * @return void
     */
    public function create($title, $message, $level, $key = 'flash_message')
    {
        session()->flash($key, [
            'title'     => $title,
            'message'   => $message,
            'level'     => $level,
        ]);
    }

    /**
     * Create an informational flash message
     * @param  string $title   The title of the message
     * @param  string $message The main body of the message
     * @return void
     */
    public function info($title, $message = '')
    {
        return $this->create($title, $message, 'info');
    }

    /**
     * Create a success flash message
     * @param  string $title   The title of the message
     * @param  string $message The main body of the message
     * @return void
     */
    public function success($title, $message = '')
    {
        return $this->create($title, $message, 'success');
    }

    /**
     * Create an error flash message
     * @param  string $title   The title of the message
     * @param  string $message The main body of the message
     * @return void
     */
    public function error($title, $message = '')
    {
        return $this->create($title, $message, 'error');
    }

    /**
     * Create an overlay flash message that requires dismissal
     * @param  string $title   The title of the message
     * @param  string $message The main body of the message
     * @param  string $level   The type of message to show. Defaults to info. ['success', 'info', 'error']
     * @return void
     */
    public function overlay($title, $message = '', $level = 'info')
    {
        return $this->create($title, $message, $level, 'flash_message-overlay');
    }
}
