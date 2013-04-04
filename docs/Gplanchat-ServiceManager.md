Namespace `Gplanchat\ServiceManager`
==========



## Classes

### Class `AbstractServiceManager`

_Declared in namespace `Gplanchat\ServiceManager`_ [» Read the docs](Gplanchat-ServiceManager.md#class-abstractservicemanager)

A basic service manager, nothing is implemented here, all is in the traits

#### Implemented Interfaces

* `Gplanchat\ServiceManager\ServiceManagerInterface`


#### Used Traits

* `Gplanchat\ServiceManager\ServiceManagerTrait`


#### Method `__construct`



##### Parameter `config`


* *type* : array
* *is nullable* : Yes
* *default value* : `NULL`


##### Parameter `configurator`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `__call`



##### Parameter `method`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes


##### Parameter `params`


* *type* : array
* *is nullable* : No


#### Method `get`

Get the service instance

##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes


##### Parameter `constructorParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


##### Parameter `ignoreInexistent`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes
* *default value* : `false`


##### Parameter `ignorePeering`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes
* *default value* : `false`


#### Method `has`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes


##### Parameter `ignorePeering`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes
* *default value* : `false`


#### Method `isAlias`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes


#### Method `isInvokable`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes


#### Method `isSingleton`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes


#### Method `invoke`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes


##### Parameter `constructorParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `invokeFactory`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes


##### Parameter `extraParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `getAlias`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes


#### Method `registerAlias`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes


##### Parameter `alias`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes


##### Parameter `allowOverride`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes
* *default value* : `false`


#### Method `registerInvokable`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes


##### Parameter `invokable`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes


##### Parameter `allowOverride`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes
* *default value* : `false`


#### Method `registerSingleton`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes


##### Parameter `singleton`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes


##### Parameter `allowOverride`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes
* *default value* : `false`


#### Method `registerFactory`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes


##### Parameter `factory`


* *type* : callable
* *is nullable* : No


##### Parameter `allowOverride`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes
* *default value* : `false`


#### Method `registerInitializer`

Register a new service initializer

##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes


##### Parameter `initializer`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `registerPeeringServiceManager`



##### Parameter `childManager`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : No


##### Parameter `peering`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes


#### Method `__invoke`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes


##### Parameter `constructorParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


##### Parameter `ignoreInexistent`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes
* *default value* : `false`


##### Parameter `ignorePeering`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes
* *default value* : `false`


#### Method `isFactory`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\AbstractServiceManager
* *is nullable* : Yes




### Class `BadMethodCallException`

_Declared in namespace `Gplanchat\ServiceManager`_ [» Read the docs](Gplanchat-ServiceManager.md#class-badmethodcallexception)

BadMethodCallException exception update, dedicated to Gplanchat\EventManager's usage

#### Implemented Interfaces

* `Gplanchat\ServiceManager\Exception`


### Class `Configurator`

_Declared in namespace `Gplanchat\ServiceManager`_ [» Read the docs](Gplanchat-ServiceManager.md#class-configurator)

Service Manager configuration helper

#### Method `__invoke`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\Configurator
* *is nullable* : No


##### Parameter `configuration`


* *type* : array
* *is nullable* : No




### Interface `Exception`

_Declared in namespace `Gplanchat\ServiceManager`_ [» Read the docs](Gplanchat-ServiceManager.md#interface-exception)

Base exception shorthand for catching all Gplanchat\EventManager's exceptions

### Interface `InitializerInterface`

_Declared in namespace `Gplanchat\ServiceManager`_ [» Read the docs](Gplanchat-ServiceManager.md#interface-initializerinterface)



#### Method `__invoke`



##### Parameter `instance`


* *type* : Gplanchat\ServiceManager\InitializerInterface
* *is nullable* : Yes


##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\InitializerInterface
* *is nullable* : No




### Class `RuntimeException`

_Declared in namespace `Gplanchat\ServiceManager`_ [» Read the docs](Gplanchat-ServiceManager.md#class-runtimeexception)

RuntimeException exception update, dedicated to Gplanchat\EventManager's usage

#### Implemented Interfaces

* `Gplanchat\ServiceManager\Exception`


### Interface `ServiceManagerAwareInterface`

_Declared in namespace `Gplanchat\ServiceManager`_ [» Read the docs](Gplanchat-ServiceManager.md#interface-servicemanagerawareinterface)



#### Method `getServiceManager`



#### Method `setServiceManager`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerAwareInterface
* *is nullable* : No




### Trait `ServiceManagerAwareTrait`

_Declared in namespace `Gplanchat\ServiceManager`_ [» Read the docs](Gplanchat-ServiceManager.md#trait-servicemanagerawaretrait)



#### Method `getServiceManager`



#### Method `setServiceManager`



##### Parameter `serviceManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerAwareTrait
* *is nullable* : No




### Interface `ServiceManagerInterface`

_Declared in namespace `Gplanchat\ServiceManager`_ [» Read the docs](Gplanchat-ServiceManager.md#interface-servicemanagerinterface)

Global interface for service management

#### Method `get`

Get the service instance

##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes


##### Parameter `constructorParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


##### Parameter `ignoreInexistent`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes
* *default value* : `false`


##### Parameter `ignorePeering`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes
* *default value* : `false`


#### Method `has`

Tests if the the service is declared @abstract

##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes


##### Parameter `ignorePeering`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes
* *default value* : `false`


#### Method `isAlias`

Detects whether the specified service name is associated with a registered service alias or not. @abstract

##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes


#### Method `isInvokable`

Detects whether the specified service name is associated with a registered invokable service or not. @abstract

##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes


#### Method `isSingleton`

Detects whether the specified service name is associated with a registered singleton service or not. @abstract

##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes


#### Method `invoke`

Invokes a new service instance @abstract

##### Parameter `className`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes


##### Parameter `constructorParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `invokeFactory`

Invokes a new service using a factory @abstract

##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes


##### Parameter `extraParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `getAlias`

Returns the aliased service @abstract

##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes


#### Method `registerAlias`

Register a new service alias @abstract

##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes


##### Parameter `alias`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes


##### Parameter `allowOverride`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes
* *default value* : `false`


#### Method `registerInvokable`

Register a new invokable service @abstract

##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes


##### Parameter `invokable`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes


##### Parameter `allowOverride`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes
* *default value* : `false`


#### Method `registerSingleton`

Register a new singleton service @abstract

##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes


##### Parameter `singleton`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes


##### Parameter `allowOverride`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes
* *default value* : `false`


#### Method `registerFactory`

Register a new service factory @abstract

##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes


##### Parameter `factory`


* *type* : callable
* *is nullable* : No


##### Parameter `allowOverride`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes
* *default value* : `false`


#### Method `registerInitializer`

Register a new service factory @abstract

##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes


##### Parameter `initializer`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `registerPeeringServiceManager`

@abstract

##### Parameter `childManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : No


##### Parameter `peering`


* *type* : Gplanchat\ServiceManager\ServiceManagerInterface
* *is nullable* : Yes




### Trait `ServiceManagerTrait`

_Declared in namespace `Gplanchat\ServiceManager`_ [» Read the docs](Gplanchat-ServiceManager.md#trait-servicemanagertrait)



#### Method `get`

Get the service instance

##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes


##### Parameter `constructorParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


##### Parameter `ignoreInexistent`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes
* *default value* : `false`


##### Parameter `ignorePeering`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes
* *default value* : `false`


#### Method `has`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes


##### Parameter `ignorePeering`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes
* *default value* : `false`


#### Method `__invoke`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes


##### Parameter `constructorParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


##### Parameter `ignoreInexistent`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes
* *default value* : `false`


##### Parameter `ignorePeering`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes
* *default value* : `false`


#### Method `isAlias`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes


#### Method `isInvokable`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes


#### Method `isSingleton`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes


#### Method `isFactory`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes


#### Method `invoke`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes


##### Parameter `constructorParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `invokeFactory`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes


##### Parameter `extraParams`


* *type* : array
* *is nullable* : No
* *default value* : `array (
)`


#### Method `getAlias`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes


#### Method `registerAlias`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes


##### Parameter `alias`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes


##### Parameter `allowOverride`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes
* *default value* : `false`


#### Method `registerInvokable`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes


##### Parameter `invokable`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes


##### Parameter `allowOverride`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes
* *default value* : `false`


#### Method `registerSingleton`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes


##### Parameter `singleton`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes


##### Parameter `allowOverride`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes
* *default value* : `false`


#### Method `registerFactory`



##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes


##### Parameter `factory`


* *type* : callable
* *is nullable* : No


##### Parameter `allowOverride`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes
* *default value* : `false`


#### Method `registerInitializer`

Register a new service initializer

##### Parameter `serviceName`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes


##### Parameter `initializer`


* *type* : callable
* *is nullable* : No


##### Parameter `priority`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes
* *default value* : `NULL`


#### Method `registerPeeringServiceManager`



##### Parameter `childManager`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : No


##### Parameter `peering`


* *type* : Gplanchat\ServiceManager\ServiceManagerTrait
* *is nullable* : Yes






[These docs are proudly built by Docgen](https://github.com/gplanchat/php-docgen)