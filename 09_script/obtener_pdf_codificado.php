<?php

/* codigo de ejemplo. No funcional */
function send()
{
    $this->db->beginTransaction();

    try {
        /* Envio del pedido*/
        $requestParams = $this->getParams();
        $response = $this->soap_client->call('DocumentarExpedicionConAviso', $requestParams);
        $traking = new SimpleXMLElement($response['DocumentarExpedicionConAvisoResult']);
        $traking->id_albaran;
        $error = $this->updateZeleris($traking);


        if ($error == 0) {

            /* Envio numero seguimiento y recogida etiqueta PDF */
            $requestParams_seg = $this->getParams_aux($traking->nseg);
            $response_seg = $this->soap_seguimiento->call('EtiquetaNSeg', $requestParams_seg);
            $response_seg = new SimpleXMLElement($response_seg['EtiquetaNSegResult']);
            echo " DATA
<pre>";
            print_r($response_seg);
            echo "</pre>";

            $pdfCode = $response_seg->expedicion->datos_etiqueta->label_data[0];

            $dataPdf = base64_decode($pdfCode, true);
            $file = fopen(dirname(__FILE__) . "/log_pdf_zeleris/" . $this->id_venta . "_etiqueta_envio.pdf", "a");
            fputs($file, $dataPdf);
            fclose($file);
            $this->db->commit();
        }
    } catch (Exception $e) {
        $this->db->rollBack();
        echo $e->getMessage();
    }

    return $traking;
}
