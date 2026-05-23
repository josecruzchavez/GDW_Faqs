<?php
namespace GDW\Faqs\Ui\Component\Form;

use GDW\Core\Helper\Data as GDWHelper;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Data\OptionSourceInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;

class Products implements OptionSourceInterface
{
    protected RequestInterface $request;
    protected GDWHelper $gdwHelper;
    /** @var array<int, array{value:mixed, label:string}>|null */
    protected ?array $productTree = null;
    protected ProductCollectionFactory $productCollectionFactory;

    public function __construct(
        ProductCollectionFactory $productCollectionFactory,
        RequestInterface $request,
        GDWHelper $gdwHelper
    ) {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->gdwHelper = $gdwHelper;
        $this->request = $request;
    }

    /**
     * @return array<int, array{value:mixed, label:string}>
     */
    public function toOptionArray()
    {
        return $this->getProductTree();
    }

    /**
     * @return array<int, array{value:mixed, label:string}>
     */
    protected function getProductTree(): array
    {
        if ($this->productTree === null) {
            $ProductById = [];
            $collection = $this->productCollectionFactory->create();
            $collection->addAttributeToSelect(['name', 'sku', 'entity_id']);
            foreach ($collection as $product) {
                if (!is_object($product) || !method_exists($product, 'getEntityId') || !method_exists($product, 'getSku') || !method_exists($product, 'getName')) {
                    continue;
                }
                $productId = $product->getEntityId();
                if (!isset($ProductById[$productId])) {
                    $ProductById[$productId] = ['value' => $productId];
                }
                $ProductById[$productId]['label'] = $product->getEntityId().' | '.$product->getSku().' | '. $product->getName();
            }
            $this->productTree = $ProductById;
        }
        return $this->productTree;
    }
}