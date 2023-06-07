<?php

namespace App\Support;

use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Response;
use stdClass;

class Summary
{
    public static function creditLines(): array
    {
        $creditLines = [];

        $creditLines['advances'] = new stdClass();
        $creditLines['advances']->description = 'Adelantos';
        $creditLines['advances']->amount = 50000;

        $creditLines['leasing'] = new stdClass();
        $creditLines['leasing']->description = 'Leasing';
        $creditLines['leasing']->amount = 3000000;

        $creditLines['mortgage'] = new stdClass();
        $creditLines['mortgage']->description = 'Hipotecarios';
        $creditLines['mortgage']->amount = 268000;

        $creditLines['personal'] = new stdClass();
        $creditLines['personal']->description = 'Personales';
        $creditLines['personal']->amount = 864000;

        $creditLines['pledge'] = new stdClass();
        $creditLines['pledge']->description = 'Prendarios';
        $creditLines['pledge']->amount = 989000;

        $creditLines['credit-cards'] = new stdClass();
        $creditLines['credit-cards']->description = 'Tarjetas de crédito';
        $creditLines['credit-cards']->amount = 571000;

        return $creditLines;
    }


    public static function creditHistory(): array
    {
        return [
            "2021" => [98,102,97,85,90,105,87,108,89,106,103,30],
            "2022" => [220,401,480,605,606,604,578,582,430,356,264,313]
        ];
    }


    /**
     * Attributes passes to view
     *
     * @param boolean $inBackground
     * @return array
     */
    public static function attributes(bool $inBackground=false): array
    {
        return [
            'creditLines' => self::creditLines(),
            'credit_history' => self::creditHistory(),
            'inBackground' => $inBackground,
        ];
    }


    /**
     * Generate PDF object
     *
     * @param boolean $inBackground
     * @return \Barryvdh\DomPDF\PDF
     */
    public static function generatePdf(bool $inBackground=false): \Barryvdh\DomPDF\PDF
    {
        Pdf::setPaper('A4', 'portrait');
        Pdf::setOptions(['javascript-delay' => 5000]);
        return Pdf::loadView('summary-profile', self::attributes($inBackground));
    }


    /**
     * Force the download of the PDF file
     *
     * @return Response
     */
    public static function download(): Response
    {
        $filename = self::filename();

        return self::generatePdf(true)->stream($filename);
//        return self::generatePdf(true)->download($filename);
    }

    /**
     * Generate a unique string to be used as filename
     *
     * @return string
     */
    public static function filename(): string
    {
        return 'summary_' . now()->timestamp . '.pdf';
    }

    /**
     * Generate the invoice QR code
     *
     * @return string
     */
    public static function qrCode(): string
    {
        $code = QrCode::format('png')->size(150)->generate('invoice-unique-code');

        return base64_encode($code);
    }
}
