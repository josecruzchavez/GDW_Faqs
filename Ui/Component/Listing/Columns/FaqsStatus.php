<?php
namespace GDW\Faqs\Ui\Component\Listing\Columns;

use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\Data\OptionSourceInterface;

class FaqsStatus extends Column implements OptionSourceInterface
{

    /**
     * @param array<string, mixed> $dataSource
     * @return array<string, mixed>
     */
    public function prepareDataSource(array $dataSource)
    {
        $dataSource = parent::prepareDataSource($dataSource);
        $options = $this->getStatuses();

        if (empty($dataSource['data']['items'])) {
            return $dataSource;
        }

        foreach ($dataSource['data']['items'] as &$item) {
            if (isset($options[$item['status']])) {
                $item['status'] = $options[$item['status']];
            }
        }

        return $dataSource;
    }

    /**
     * @return array<int, array{value:string, label:\Magento\Framework\Phrase}>
     */
    public function toOptionArray()
    {
        return $this->getStatusesOptionArray();
    }

    /**
     * @return array<int|string, \Magento\Framework\Phrase>
     */
    public function getStatuses(): array
    {
        return [
            '1' => __('Enable'),
            '0' => __('Disable')
        ];
    }

    /**
     * @return array<int, array{value:string, label:\Magento\Framework\Phrase}>
     */
    public function getStatusesOptionArray(): array
    {
        $result = [];
        foreach ($this->getStatuses() as $value => $label) {
            $result[] = ['value' => (string) $value, 'label' => $label];
        }
        return $result;
    }
}
