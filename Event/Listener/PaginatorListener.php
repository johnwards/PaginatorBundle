<?php

namespace Knplabs\PaginatorBundle\Event\Listener;

use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Customized event listener. Handles subscribtion
 * of events
 */
abstract class PaginatorListener
{
    /**
     * Count event
     */
    const EVENT_COUNT = 'knplabs_paginator.count';
    
    /**
     * Items event
     */
    const EVENT_ITEMS = 'knplabs_paginator.items';
    
    /**
     * Get the subscribtion event list
     * for the listener
     * 
     * @return array
     */
    abstract protected function getEvents();
    
    /**
     * Subscribe events to the EventDispacher
     * 
     * @param EventDispatcher $dispacher
     * @param integer $priority
     * @return Knplabs\PaginatorBundle\Event\Listener\PaginatorListener
     */
    public function subscribe(EventDispatcher $dispacher, $priority = 0)
    {
        foreach ($this->getEvents() as $event => $callback) {
            $dispacher->connect($event, array($this, $callback), $priority);
        }
        return $this;
    }
}