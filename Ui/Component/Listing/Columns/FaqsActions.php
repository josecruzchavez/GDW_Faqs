<?php
namespace GDW\Faqs\Ui\Component\Listing\Columns;

class FaqsActions extends \Magento\Ui\Component\Listing\Columns\Column
{
    const URL_EDIT_PATH = 'gdw_faqs/faq/edit';
    const URL_DELETE_PATH = 'gdw_faqs/faq/delete';

    protected $urlBuilder;

    public function __construct(
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['id'])) {
                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_EDIT_PATH,
                                [
                                    'id' => $item['id'],
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