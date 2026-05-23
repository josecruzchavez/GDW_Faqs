<?php
namespace GDW\Faqs\Ui\Component\Listing\Columns;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;

class FaqsCategoryActions extends \Magento\Ui\Component\Listing\Columns\Column
{
    const URL_EDIT_PATH = 'gdw_faqs/faqcategory/edit';
    const URL_DELETE_PATH = 'gdw_faqs/faqcategory/delete';

    protected UrlInterface $urlBuilder;

    /**
     * @param array<string, mixed> $components
     * @param array<string, mixed> $data
     */
    public function __construct(
        UrlInterface $urlBuilder,
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * @param array<string, mixed> $dataSource
     * @return array<string, mixed>
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']) && is_array($dataSource['data']) && isset($dataSource['data']['items']) && is_array($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (!is_array($item)) {
                    continue;
                }
                if (isset($item['category_id'])) {
                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_EDIT_PATH,
                                [
                                    'category_id' => $item['category_id'],
                                ]
                            ),
                            'label' => __('Edit'),
                        ],
                        /* 'delete' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_DELETE_PATH,
                                [
                                    'id' => $item['id'],
                                ]
                            ),
                            'label' => __('Delete'),
                        ],*/
                    ];
                }
            }
        }
        return $dataSource;
    }
}