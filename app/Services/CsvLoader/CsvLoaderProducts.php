<?php

namespace app\Services\CsvLoader;

use app\Models\Products;

class CsvLoaderProducts extends CsvLoader
{

    protected function getRows(array $file): \Generator
    {
        $key = 0;
        $fileCsv = fopen($file['file']['tmp_name'], "r");
        while (!feof($fileCsv)) {
            $items = explode(';', fgets($fileCsv));
            yield $key => $this->formatRow($items);
            $key++;
        }
        fclose($fileCsv);
    }

    private function formatRow($items): array
    {
        $rowItems = [];
        foreach ($items as $item) {
            $rowItems[] = str_replace([',,', '"'], '', $item);
        }
        $rowItems[5] = str_replace(',', '.', $rowItems[5]);
        $rowItems[6] = str_replace(',', '.', $rowItems[6]);
        $clearDescription = str_replace(',', '', $rowItems[13]);
        $rowItems[13] = $clearDescription ?? null;
        $fullDescription = null;
        for ($i = 13; $i <= count($rowItems); $i++) {
            if (isset($rowItems[$i])) {
                $fullDescription .= $rowItems[$i];
                unset($rowItems[$i]);
            }
        }
        $rowItems[13] = $fullDescription;
        return $rowItems;
    }

    public function load(array $file)
    {
        foreach ($this->getRows($file) as $key => $row) {
            if ($key == 0) continue;
            $product = new Products;
            $product->code = $row[0];
            $product->name = $row[1];
            $product->level_1 = $row[2];
            $product->level_2 = $row[3];
            $product->level_3 = $row[4];
            $product->price = $row[5];
            $product->price_sp = $row[6];
            $product->quantity = $row[7];
            $product->property_fields = $row[8];
            $product->joint_purchases = $row[9];
            $product->unit_measurement = $row[10];
            $product->picture = $row[11];
            $product->display_main = $row[12];
            $product->description = $row[13];
            $product->save();
        }
    }
}