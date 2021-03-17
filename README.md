# OpenTHC

OpenTHC Application is an Inventory Control, Seed to Sale, Track-and-Trace System


## Installation

You should run this as a user that has the ability to `sudo`

	git clone ...
	./sbin/init.sh

You will need to configure the Apache and/or Nginx services, adjust firewall rules, etc.


## From Scratch

 * Create the Root Database and the Auth Database
 * Add a System (1) Contact/User and Company/Group (1)
 * Add System API Key, update DB and INI


## Dependent Services

 * [Install Postgresql](./doc/SQL.md)
 * [Install Statsd](./doc/Metrics.md)
