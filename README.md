# HydrateExample

I'm trying to create a small example to hydrate zf2 forms to doctrine entities. You can find my code example at https://github.com/inbaz/HydrateExample

I generated my doctrine entities by using the https://github.com/johmue/mysql-workbench-schema-exporter. After that I extend my entities to use MappedSuperclass to be able to do fast changes in mysql workbench without merge my own changes in the entities to the generated files every time.

Since these generated entities implement the InputFilterAwareInterface there is already a filter named 'debitor' in my case when it comes to the attachInputFilterDefaults call in Zend\Form\Form on line 696 (using zf2 2.5.1). This leads to not add the filter for my contact collection in my debitor fieldset which results in not having the contact hydrated to the according entity. Because my entities implement InputFilterAwareInterface the InputFilter of the according entity is used instead of the one I defined in my fieldset (zf2 Zend\Form\Form line 812).

Additionally I added the example of DoctrineModule hydrator.md with a BlogPost and Tags which works quite well. But I think the reason for that is that the entities do not implement the InputFilterAwareInterface.

Is it possible to use zf2 Form with InputFilterAwareInterface Doctrine entities? What do I need to change to make this conjunction work like expected?