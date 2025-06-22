#[ORM\Entity]
class OrganisationCode
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 12, unique: true)]
    private string $code;

    #[ORM\OneToOne(inversedBy: 'organisationCode', targetEntity: Organisation::class)]
    #[ORM\JoinColumn(nullable: false)]
    private Organisation $organisation;

    public function __construct(string $code, Organisation $organisation)
    {
        $this->code = $code;
        $this->organisation = $organisation;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getOrganisation(): Organisation
    {
        return $this->organisation;
    }
}
