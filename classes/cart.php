<?php

class Cart {

    protected $CartContents;

    public function __construct() {

        if (isset($_SESSION['ShoppingCart'])) 
        {
            $this->CartContents = $_SESSION['ShoppingCart'];
        } 
        elseif ($this->CartContents === NULL) 
        {
            $this->CartContents = array('cart_total' => 0, 'total_items' => 0);
        }
    }

    public function insert($item = array()) {

        if (!is_array($item) || count($item) === 0) {
            die('Error , The insert method must be passed an array containing data.');
            return FALSE;
        } 
        else 
        {
            if (is_numeric($item['id']) && is_numeric($item['quantity']) && is_numeric($item['price']) && isset($item['name'])) {
                if (isset($item['options']) && count($item['options']) > 0) {
                    $rowid = md5($item['id'] . serialize($item['options']));
                } else {
                    $rowid = md5($item['id']);
                }
                if (isset($this->CartContents[$rowid])) {
                    $old_quantity = $this->CartContents[$rowid]['quantity'];
                    $this->update(
                            array(
                                'rowid' => $rowid,
                                'id' => $item['id'],
                                'name' => $item['name'],
                                'quantity' => $item['quantity'] + $old_quantity,
                                'price' => $item['price'],
                                'options' => (isset($item['options'])) ? $item['options'] : NULL
                            )
                    );
                    return TRUE;
                }
                $item['rowid'] = $rowid;
                $this->CartContents[$rowid] = $item;
                $this->save_cart();
            } 
            else 
            {
                return FALSE;
            }
        }
    }

    public function update($item = array()) {
        if (!is_array($item) || count($item) === 0 || empty($item['rowid'])) 
        {
            return FALSE;
        } 
        else 
        {
            $rowid = strval($item['rowid']);
            if (isset($this->CartContents[$rowid])) 
            {
                if (isset($item['price'])) {
                    $item['price'] = (int) $item['price'];
                }
                if (isset($item['quantity'])) {
                    if ($item['quantity'] === 0) {
                        $this->remove($rowid);
                        return TRUE;
                    } else {
                        $item['quantity'] = (int) $item['quantity'];
                    }
                }

                $keys = array_intersect(array_keys($this->CartContents[$rowid]), array_keys($item));
                foreach (array_diff($keys, array('id', 'name')) as $key) {
                    $this->CartContents[$rowid][$key] = $item[$key];
                }
                $this->save_cart();
            }
            return TRUE;
        }
    }

    protected function save_cart() {
        $this->CartContents['total_items'] = $this->CartContents['cart_total'] = 0;
        foreach ($this->CartContents as $key => $val) {
            if (!is_array($val) OR ! isset($val['price'], $val['name'], $val['quantity'], $val['id'], $val['rowid'])) {
                continue;
            }

            $this->CartContents['cart_total'] += ($val['price'] * $val['quantity']);
            $this->CartContents['total_items'] += $val['quantity'];
            $this->CartContents[$key]['subtotal'] = ($this->CartContents[$key]['price'] * $this->CartContents[$key]['quantity']);
        }
        if (count($this->CartContents) <= 2) {
            unset($_SESSION);
            return FALSE;
        }
        $_SESSION['ShoppingCart'] = $this->CartContents;
        return TRUE;
    }

    public function total() {
        return $this->CartContents['cart_total'];
    }

    public function total_items() {
        return $this->CartContents['total_items'];
    }

    public function remove($rowid) {
        $r = settype($rowid, 'string');
        if (isset($this->CartContents[$r])) {
            unset($this->CartContents[$r]);
            $this->save_cart();
            return TRUE;
        } else {
            die('Error , The item doesn\'t exist');
        }
    }

    public function contents() {
        $cart = array_reverse($this->CartContents);
        unset($cart['total_items']);
        unset($cart['cart_total']);
        return $cart;
    }

    public function destroy() {
        $this->CartContents = array('cart_total' => 0, 'total_items' => 0);
        unset($_SESSION['ShoppingCart']);
    }

}
