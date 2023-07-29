<?php

interface Buyer {
    public function buy(string $productName): bool;
}

interface Seller {
    public function sell(string $productName): bool;
}

class EuropeanClient implements Buyer, Seller {
    private array $items = [];

    public function buy(string $productName): bool {
        $this->items[] = $productName;
        return true;
    }

    public function sell(string $productName): bool {
        foreach ($this->items as &$item) {
            if ($item === $productName) {
                unset($item);
                return true;
            }
        }
        return false;
    }
}
class AmericanClient implements Buyer, Seller {

    public function buy(string $productName): bool {
        // different implementation
    }

    public function sell(string $productName): bool {
        // different implementation
    }
}