<!DOCTYPE html>
<html>

    <head>
        <title>Kotak Saran Esec Academy</title>
    </head>

    <body>
        <div style="width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 15px; text-align: center; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <div style="display: flex; align-items: center; justify-content: space-between; padding-bottom: 20px; border-bottom: 1px solid #ddd;">
                <img alt="Icon Header" style="width: 100%; max-width: 75px; max-height: 75px;" src="https://siakad-pt.internal-dev.id/storage/images/website/site-logo.png">
                <div style="font-size: 24px; font-weight: bold;">Siakad PT By Internal Dev</div>
            </div>
            <h2>Halo, Web Administrator</h2>
            <p>Sekarang kamu menerima saran nih dari {{ $saran['name'] }}. Dia mau ngasih saran  <b>{{ $saran['subject'] }}</b> yang kurang lebih detailnya gini:</p>
            <p>{!! $saran['desc'] !!}</p>
            <p>Itu aja isi sarannya, terima kasih</p>
        </div>
    </body>

</html>
