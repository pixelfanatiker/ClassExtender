ClassExtender Extra for MODx Revolution
=======================================


**Author:** Bob Ray <http://bobsguides.com> [Bob's Guides](http://bobsguides.com)

Documentation is available at [Bob's Guides](http://bobsguides.com/classextender-tutorial.html)

ClassExtender Extra

A utility to create extended MODX objects. By default
creates an extended modUser object called extUser.

This is a *very* pre-alpha version right now. It is currently set up (and works) for a particular use case with a class that extends modUser.
I'm putting it on GitHub for people who might find it useful, but there are no docs yet.

Edit the schema file to match the extra user fields you want to store in your custom extended user table.

(optional) Edit the ExtraUserFields plugin to add your custom fields to the Create/Edit User form in the Manager and save them to the custom table.

Run build.transport.php and install the resulting package. Use MODX_CORE_PATH . 'components/classextender' as the model
path for the extended classes. Installation will add the package to the extension_packages System Setting so the class will be
loaded on every page request and will always be available.

The extra user fields are in an object called Data (in their own custom table):

$user->getOne('Data');

It is basically just an extra User Profile with a different name. Treat it just as you do the User Profile.

