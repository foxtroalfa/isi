<?php   
    $espera_pago = '{
                      "id": "41122f63-6ad9-4e1e-a832-8b63c57f2912",
                      "creation_date": 1655438476671,
                      "event": "PURCHASE_BILLET_PRINTED",
                      "version": "2.0.0",
                      "data": {
                        "product": {
                          "id": 0,
                          "name": "Produto test postback2",
                          "has_co_production": false
                        },
                        "affiliates": [
                          {
                            "name": ""
                          }
                        ],
                        "buyer": {
                          "email": "testeComprador271101postman15@example.com"
                        },
                        "producer": {
                          "name": "Producer Test Name"
                        },
                        "commissions": [
                          {
                            "value": 149.5,
                            "source": "MARKETPLACE"
                          },
                          {
                            "value": 1350.5,
                            "source": "PRODUCER"
                          }
                        ],
                        "purchase": {
                          "approved_date": 1511783346000,
                          "full_price": {
                            "value": 1500
                          },
                          "original_offer_price": {
                            "value": 1500,
                            "currency_value": "BRL"
                          },
                          "price": {
                            "value": 1500
                          },
                          "order_date": 1511783344000,
                          "status": "BILLET_PRINTED",
                          "transaction": "HP06915537991395",
                          "payment": {
                            "installments_number": 12,
                            "type": "CREDIT_CARD"
                          }
                        }
                      }
                    }';
    $compra_completa = '{
                          "id": "cb2a2638-992c-40fb-8be2-3e8dfee52f8c",
                          "creation_date": 1655438475886,
                          "event": "PURCHASE_COMPLETE",
                          "version": "2.0.0",
                          "data": {
                            "product": {
                              "id": 0,
                              "name": "Produto test postback2",
                              "has_co_production": false
                            },
                            "affiliates": [
                              {
                                "name": ""
                              }
                            ],
                            "buyer": {
                              "email": "testeComprador271101postman15@example.com"
                            },
                            "producer": {
                              "name": "Producer Test Name"
                            },
                            "commissions": [
                              {
                                "value": 149.5,
                                "source": "MARKETPLACE"
                              },
                              {
                                "value": 1350.5,
                                "source": "PRODUCER"
                              }
                            ],
                            "purchase": {
                              "approved_date": 1511783346000,
                              "full_price": {
                                "value": 1500
                              },
                              "original_offer_price": {
                                "value": 1500,
                                "currency_value": "BRL"
                              },
                              "price": {
                                "value": 1500
                              },
                              "order_date": 1511783344000,
                              "status": "COMPLETED",
                              "transaction": "HP16015479281022",
                              "payment": {
                                "installments_number": 12,
                                "type": "CREDIT_CARD"
                              }
                            }
                          }
                        }';
    $compra_plazo_vencido = '{
                              "id": "b5b0735b-dd6d-4ebd-bbeb-88719825df93",
                              "creation_date": 1655438478746,
                              "event": "PURCHASE_EXPIRED",
                              "version": "2.0.0",
                              "data": {
                                "product": {
                                  "id": 0,
                                  "name": "Produto test postback2",
                                  "has_co_production": false
                                },
                                "affiliates": [
                                  {
                                    "name": ""
                                  }
                                ],
                                "buyer": {
                                  "email": "testeComprador271101postman15@example.com"
                                },
                                "producer": {
                                  "name": "Producer Test Name"
                                },
                                "commissions": [
                                  {
                                    "value": 149.5,
                                    "source": "MARKETPLACE"
                                  },
                                  {
                                    "value": 1350.5,
                                    "source": "PRODUCER"
                                  }
                                ],
                                "purchase": {
                                  "approved_date": 1511783346000,
                                  "full_price": {
                                    "value": 1500
                                  },
                                  "original_offer_price": {
                                    "value": 1500,
                                    "currency_value": "BRL"
                                  },
                                  "price": {
                                    "value": 1500
                                  },
                                  "order_date": 1511783344000,
                                  "status": "EXPIRED",
                                  "transaction": "HP09915534436216",
                                  "payment": {
                                    "installments_number": 12,
                                    "type": "CREDIT_CARD"
                                  }
                                }
                              }
                            }';
    $compra_aprobada = '{
                          "id": "d36845df-e102-4220-97b8-486f7cbc7243",
                          "creation_date": 1655438479225,
                          "event": "PURCHASE_APPROVED",
                          "version": "2.0.0",
                          "data": {
                            "product": {
                              "id": 0,
                              "name": "Produto test postback2",
                              "has_co_production": false
                            },
                            "affiliates": [
                              {
                                "name": ""
                              }
                            ],
                            "buyer": {
                              "email": "testeComprador271101postman15@example.com"
                            },
                            "producer": {
                              "name": "Producer Test Name"
                            },
                            "commissions": [
                              {
                                "value": 149.5,
                                "source": "MARKETPLACE"
                              },
                              {
                                "value": 1350.5,
                                "source": "PRODUCER"
                              }
                            ],
                            "purchase": {
                              "approved_date": 1511783346000,
                              "full_price": {
                                "value": 1500
                              },
                              "original_offer_price": {
                                "value": 1500,
                                "currency_value": "BRL"
                              },
                              "price": {
                                "value": 1500
                              },
                              "order_date": 1511783344000,
                              "status": "APPROVED",
                              "transaction": "HP1121336654889",
                              "payment": {
                                "installments_number": 12,
                                "type": "CREDIT_CARD"
                              }
                            },
                            "subscription": {
                              "status": "ACTIVE",
                              "plan": {
                                "name": "plano de teste"
                              },
                              "subscriber": {
                                "code": "I9OT62C3"
                              }
                            }
                          }
                        }';

    exit;
?>


{
    "status": "success",
    "messages": [
        {
            "key": "RollbackSuccessful",
            "dsc": "Transacción Aprobada",
            "level": "info"
        }
    ]
}



<?php
    /*
        require('_sys/init.php');
        $bancard = new Bancard();
        $res = $bancard->get_response();
        $r = objectToArray(json_decode($res));


       $_POST['token']                          = $r["operation"]['token'];
       $_POST['shop_process_id']                = $r["operation"]['shop_process_id'];
       $_POST['response']                       = $r["operation"]['response'];
       $_POST['response_details']               = $r["operation"]['response_details'];
       $_POST['amount']                         = $r["operation"]['amount'];
       $_POST['currency']                       = $r["operation"]['currency'];
       $_POST['authorization_number']           = $r["operation"]['authorization_number'];
       $_POST['ticket_number']                  = $r["operation"]['ticket_number'];
       $_POST['response_code']                  = $r["operation"]['response_code'];
       $_POST['response_description']           = $r["operation"]['response_description'];
       $_POST['extended_response_description']  = $r["operation"]['extended_response_description'];
       $_POST['security_information']           = $r["operation"][''];
       $_POST['bancard_status']                 = 1;


        $error = Transactions_bancard::save(0);

<pre>
    Array
    (
        [operation] => Array
            (
                [token] => 07cd14db840fb89dedc129699904089b
                [shop_process_id] => 980543
                [response] => S
                [response_details] => Procesado Satisfactoriamente
                [amount] => 140816.00
                [currency] => PYG
                [authorization_number] => 715421
                [ticket_number] => 2118007606
                [response_code] => 00
                [response_description] => Transaccion aprobada
                [extended_response_description] => 
                [security_information] => Array
                    (
                        [customer_ip] => 190.211.243.190
                        [card_source] => L
                        [card_country] => PARAGUAY
                        [version] => 0.3
                        [risk_index] => 0
                    )

            )

    )
</pre>

/*
if(!empty($response)) {
    $response = json_decode($response); 
    if(isset($response->operation->shop_process_id) && $response->operation->shop_process_id > 0) {
        if($response->operation->response_code == '00') {
            ExecuteReader("UPDATE a_bancard SET estado = 'PAGADO', respuesta = '*?*' WHERE id = *?*;", array(
                serialize($response),
                $response->operation->shop_process_id
            ));
        } else {
            ExecuteReader("UPDATE a_bancard SET estado = 'ERROR', respuesta = '*?*' WHERE id = *?*;", array(
                serialize($response),
                $response->operation->shop_process_id
            ));
        }
        $response = array('status' => 'success');
        echo json_encode($response);
    } else {
        ExecuteReader("UPDATE a_bancard SET estado = 'ERROR', respuesta = '*?*' WHERE id = *?*;", array(
            serialize($response),
            $response->operation->shop_process_id
        ));
        $response = array('status' => 'error');
        echo json_encode($response);
    }
}
*/
?>