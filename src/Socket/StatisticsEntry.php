<?php
namespace Viauco\Realtime\Socket;

class StatisticsEntry extends \Viauco\Realtime\Models\Model
{
    protected $collection = 'websockets_statistics_entries';

    protected $connection = 'mongodb';
    
}