Use this field like this:

```php

class MyDataObject extends DataObject {

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $array = [
            'Fruit' => [
                'Apples' => [
                    'Granny Smith' => [
                        '<strong>Color</strong>: Green',
                        '<strong>Flavor</strong>: Tart',
                    ],
                    'Red Delicious' => [
                        '<strong>Color</strong>: Red',
                        '<strong>Flavor</strong>: Sweet',
                        '<a href="https://test.com">More Information on the Red Delicious</a>',
                    ],
                    'Golden Delicious',
                ],
                'Oranges' => [
                    'Navel',
                    'Valencia',
                ],
                'Bananas' => [
                    'Cavendish',
                    'Lady Finger',
                ],
            ],
            'Vegetables' => [
                'Root' => [
                    'Carrot',
                    'Beet',
                    'Radish',
                ],
                'Leafy' => [
                    'Lettuce',
                    'Spinach',
                    'Kale',
                ],
                'Cruciferous' => [
                    'Broccoli',
                    'Cauliflower',
                    'Brussels Sprouts',
                ],
            ],
        ]
        $fields->addFieldToTab('Root.Main', new HierarchicalListField('MyField', 'My Field', $array));
        return $fields;
    }

}
```
