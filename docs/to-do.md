To-Do 📃
==

List of tasks to improve, fix and complete the project .

## Components and architecture
* [ ] Format error response to JSON
* [ ] Extract response formatting to requests Symfony subscribers to decouple format from controllers
* [ ] Refactor DI to decouple it from the base framework
* [ ] Find a decoupled way to expose an API doc using OAS
* [ ] Validate requests against OAS

## Environment and data
* [ ] Create command to wrap the migrations execution
* [ ] Create commands to wrap the import/generation of the seeds
* [ ] Add xdebug to php image

## Endpoints and business logic
* [ ] Move Console to proper UI folder
* [ ] Add Console controller to create a Specie
* [ ] Remove API controller to create a Specie
* [ ] Add use case and Console controller to delete a Specie
* [ ] Add use case and API controller to get a Specie
* [ ] Add use case and API controller to list Species
* [ ] Add filters to list Species
* [ ] Guard against existing Specie with given identifier
* [ ] Guard against existing Specie with given name
* [ ] Add Pokemon mapping and custom types
* [ ] Add use case and API controller to create a Pokemon
* [ ] Add use case and API controller to edit a Pokemon
* [ ] Add use case and API controller to delete a Pokemon
* [ ] Add use case and API controller to get a Pokemon
* [ ] Add use case and API controller to list Pokemon
* [ ] User and Authentication
* [ ] Trainer extending from User