<?php

/**
 * Service Container is an IoC Container or DI Container
 *
 * The Laravel service container is a powerful tool for managing
 * class dependencies and performing dependency injection.
 */
class Container {

    protected $resolvedInstances = [];
    protected $bindings = [];

    public function bind($abstract, $concrete)
    {
        $this->bindings[$abstract] = $concrete;
    }

    public function resolve($className)
    {
        $reflector = new  Reflection($className);
        $dependencies = $reflector->getConstructor();  // ['CommentRepository']

        $resolvedDependencies = [];

        foreach ($dependencies as $dependency) {
            // recursive call
            if (!array_key_exists($dependency, $this->resolvedInstances[$dependency])) {
                $this->resolvedInstances[$dependency] = $this->resolve($dependency);
            }

            $resolvedDependencies[] = $this->resolvedInstances[$dependency];
        }

        if (array_key_exists($className, $this->bindings)) {
            return $this->bindings[$className]();
        }

        return $reflector->createFromArguments(...$resolvedDependencies);
    }
}

// class
// => Dependency A
// ==> Dependency B
// ...

class PostController {
    // for resolve
    public function __construct(CommentRepository $repo)
    {
        
    }


    // for bind
    public function construct2(CommentInterface $comment)
    {

    }
}

interface CommentInterface {

}


class CommentRepository {
    public function __construct(RatingService $ratingService)
    {
    }
}

(new Container())->resolve(PostController::class);

// way 1
(new Container())->bind(CommentInterface::class, CommentRepository::class);
// way 2
(new Container())->bind(CommentInterface::class, function () {
    // use any logic
    if (11 /** any logic */) {
        return new ClassA();
    } else {
        return new ClassB();
    }
});


// service container helps us to achieve
// Dependency Inject
// Service Locator



//new  PostController(new CommentRepository());