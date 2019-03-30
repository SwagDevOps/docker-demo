<?php

/**
 * Fill login form automaticaly
 *
 * Install to Adminer on http://www.adminer.org/plugins/
 *
 * @author Pavel Kutáč, http://www.kutac.cz/
 *
 */
class FillLoginForm
{
    private $system;
    private $server;
    private $name;
    private $pass;
    private $database;

    /**
     * Initialize plugin for filling login form
     *
     * @param $system - Set driver
     *   server - MySQL
     *   sqlite - SQLite3
     *   sqlite2 - SQLite2
     *   pgsql - PostgreeSQL
     *   oracle - Oracle
     *   mssql - MS SQL
     *   firebird - Firebird (alpha)
     *   simpledb - SimpleDB
     *   mongo - MongoDB
     *   elastic - Elasticsearch
     *
     * @param $server - Server to log in, default: localhost
     * @param $name - User name
     * @param $pass - Password to database
     * @param $database - Name of database
     */
    public function __construct($system = "server", $server = false, $name = false, $pass = false, $database = false)
    {
        $this->system = $system;
        $this->server = $server;
        $this->name = $name;
        $this->pass = $pass;
        $this->database = $database;
    }

    public function loginForm()
    {
        include __DIR__ . '/fill-login-form/script.php';

        return null;
    }
}