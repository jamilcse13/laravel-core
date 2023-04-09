<?php

/**
 * Laravel has multiple separate services like
 * Auth, View, queue, cache, support, Auth, Route, Session, etc
 * These are manageable and reusable.
 * Laravel has told these Components
 *
 * We get all the services at any laravel project
 * When the application runs, all the services will be available in the application.
 * Service Provider does it.
 */

/**
 * config/app => providers
 * The list of the default services which will be activated when the application runs
 * We can add custom Services here
 *
 */

/**
 * Service Provider will prepare the services for our application when it is started
 *
 * which services?
 * Those services which have to be prepared before handling the main requests
 *
 * Service providers are the central place of all Laravel application bootstrapping.
 * Your own application, as well as all of Laravel's core services, are bootstrapped via service providers.
 *
 */


/**
 * 3 types of services
 * Laravel Framework Service Providers      => default services
 * Package Service Providers    => if we add any new packages and it has any services to initialize or bootstrap
 * Application Service Providers  => these are having app/Providers directory
 */


/**
 * Service Provider has 2 methods
 * register(): if we want to register anything
 * boot(): if we want to resolve any dependency which is needed to use
 */


/**
 * DeferrableProvider: when any services don't need to register or resolve. it is an interface
 * Uses LazyLoading approach
 * it uses a provides() method
 */