<?php
namespace GDW\Faqs\Ui\Component\Listing\Columns;

use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\Data\OptionSourceInterface;

class FaqsCategoryStatus extends Column implements OptionSourceInterface
{

    public function prepareDataSource(array $dataSource)
    {
        $dataSource = parent::prepareDataSource($dataSource);
        $options = $this->getStatuses();

        if (empty($dataSource['data']['items'])) {
            return $dataSource;
        }

        foreach ($dataSource['data']['items'] as &$item) {
            if (isset($options[$item['category_status']])) {
                $item['category_status'] = $options[$item['category_status']];
            }
        }

        return $dataSource;
    }

    public function toOptionArray()
    {
        return $this->getStatusesOptionArray();
    }

    public function getStatuses()
    {
        return [
            '1' => __('Enable'),
            '0' => __('Disable')
        ];
    }

    public function getStatusesOptionArray()
    {
        $result = [];
        foreach ($this->getStatuses() as $value => $label) {
            $result[] = ['value' => $value, 'label' => $label];
        }
        return $result;
    }
}
