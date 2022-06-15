# Relations between entities

Some thinks about tables relation

## inversedBy and mappedBy

inversedBy and mappedBy are used by the INTERNAL DOCTRINE engine to reduce the number of SQL queries it has to do to get the information it needs. To be clear, if you don't add inversedBy or mappedBy your code will still work but will not be optimized.

- **mappedBy** must be specified on the reverse side of an association (bidirectional)
- **inversedBy** must be specified on the owning side of an association (bidirectional)

### Use cases

- ManyToOne is always the owning side of a bidirectional association.
- OneToMany is always the reverse side of a bidirectional association.
- The owning side of a OneToOne association is the entity with the table that contains the foreign key.
- ManyToMany you can choose the owner side ([Doc] (<https://www.doctrine-project.org/projects/doctrine-orm/en/2.9/reference/association-mapping.html#owning-and-inverse-side> -on-a-manytomany-association))

[Doc] (<https://www.doctrine-project.org/projects/doctrine-orm/en/latest/reference/unitofwork-associations.html>)

## ManyToMany

```php

class Collectives{
//. . .

    /**
     * @ORM\ManyToMany(targetEntity=Portal::class, inversedBy="collectives")
     * @ORM\JoinTable(name="colectivosPortales",
     * joinColumns={@ORM\JoinColumn(name="CollectiveID", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="idPortal", referencedColumnName="id")}
     *)
     */

    private $portals;

//. . .
}

class Portals {

//. . .

    /**
     * @var Collective []
     * @ORM\ManyToMany(targetEntity=Collective::class, mappedBy="portals")
     */
    private $collectives;

//. . .
}

```

From the Collectives class, the **JoinTable** part of the call is optional. When using it, we can define the name of the table and the name of the properties

**Important** By default we can only persist data from the owner side. If we want to persist data from a form created with the inverse entity (in this case Portals), we must add the option `'by_reference' => false` when creating the field in the formType.
[Info] (<https://afilina.com/doctrine-not-saving-manytomany>)

## ManyToMany (with additional data in the union table)

When we have a *ManyToMany* relationship and in the reborn table we want to have more fields than the respective id, the direct many-to-many association disappears and is replaced by one-to-many / many-to-one associations between the 3 participating classes [Doc] (<https://www.doctrine-project.org/projects/doctrine-orm/en/2.9/reference/association-mapping.html#many-to-many-unidirectional>)

The steps would be:

- Create the intermediate entity with the additional attributes
- Modify the other entity by adding the relationship attributes of type One to many to intermediate entity
- Modify the intermediate entity by adding the relationship attributes of type Many to one

A relationship of *beneficiaries* with *portals* many to many would look like this:

```php
class BeneficiaryPortal {
//. . .

     /**
     * @ORM\ManyToOne(targetEntity=Beneficiary::class, inversedBy="beneficiaryPortals")
     * @ORM\JoinColumn(name="beneficiaryid", referencedColumnName="id")
     */
    private $beneficiary;

    /**
     * @ORM\ManyToOne(targetEntity=Portal::class, inversedBy="beneficiaryPortals")
     * @ORM\JoinColumn(name="idPortal", referencedColumnName="id")
     */
    private $portal;

//. . .
}

class Beneficiary {
//. . .

     /**
     * @ORM\OneToMany(targetEntity=BeneficiaryPortal::class, mappedBy="beneficiary", orphanRemoval=true)
     * @ORM\JoinColumn(name="recipientsPortales", referencedColumnName="id")
     */
    private $beneficiaryPortals;

//. . .

}

class Portal {
//. . .

      /**
     * @ORM\OneToMany(targetEntity=BeneficiaryPortal::class, mappedBy="portal", orphanRemoval=true)
     * @ORM\JoinColumn(name="recipientsPortales", referencedColumnName="id")
     */
    private $beneficiaryPortals;

//. . .

}

```

From the BeneficiaryPortal class, the **JoinTable** part of the call is optional. When using it, we can define the name of the relationship attributes

Of the Portal and Beneficiary classes the **JoinColumn** part is also optional. Give a name to the property and indicate the doctrine that refers to the id of the table itself (which is the one that relates to BeneficiaryPortal)

[orphanRemoval](https://www.doctrine-project.org/projects/doctrine-orm/en/2.11/reference/working-with-associations.html#orphan-removal) makes that when removing the reference to BeneficiaryPortal from the portal the row of BeneficiaryPortal is also eliminated

---

[<-- index](/symfony/database-doctrine/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)
