<?php

return [
    'dashboard' => 'Genel',
    '404' => 'Sayfa bulunamadı.',
    'auth' => [
        'title' => 'Yetkilendirme',
        'username' => 'Kullanıcı Adı',
        'password' => 'Şifre',
        'login' => 'Oturum Aç',
        'logout' => 'Oturumu Kapat',
        'wrong-username' => 'Hatalı kullanıcı adı',
        'wrong-password' => 'veya şifre',
        'since' => ':date tarihinden beri kayıtlı',
    ],
    'model' => [
        'create' => ':title bölümüne yeni kayıt gir',
        'edit' => ':title bölümünde kayıt güncelle',
    ],
    'links' => [
        'index_page' => 'Site linki',
    ],
    'ckeditor' => [
        'upload' => [
            'success' => 'Dosya gönderildi: \\n- Boyut: :size kb \\n- en/boy: :width x :height',
            'error' => [
                'common' => 'Dosya gönderilemedi.',
                'wrong_extension' => 'Dosya ":file" hatalı uzantıya sahip.',
                'filesize_limit' => 'Maksimum izin verilen dosya boyutu :size kb.',
                'imagesize_max_limit' => 'En x Boy = :width x :height \\n Maksimum En x Boy: :maxwidth x :maxheight olmalı.',
                'imagesize_min_limit' => 'En x Boy = :width x :height \\n Minimum En x Boy: :minwidth x :minheight olmalı.',
            ],
        ],
        'image_browser' => [
            'title' => 'Sunucudan resim yükle',
            'subtitle' => 'Giriş için resim seç',
        ],
    ],
    'table' => [
        'new-entry' => 'Ekle',
        'edit' => 'Düzenle',
        'restore' => 'Geri Al',
        'delete' => 'Sil',
        'delete-confirm' => 'Silmek istediğinizden emin misiniz?',
        'delete-error' => 'Bu kaydı silerken hata oluştu. Öncelikle tüm bağlantılı kayıtları silmeniz gereklidir.',
        'destroy' => 'Yok et',
        'destroy-confirm' => 'Kalıcı olarak silmek istediğinizden emin misiniz?',
        'destroy-error' => 'Bu kaydı kalıcı olarak silerken hata oluştu. Öncelikle tüm bağlantılı kayıtları silmeniz gereklidir.',
        'moveUp' => 'Yukarı Taşı',
        'moveDown' => 'Aşağı Taşı',
        'error' => 'Sorgu sırasında hata oluştu',
        'filter' => 'Benzer kayıtları görüntüle',
        'filter-goto' => 'Görüntüle',
        'save' => 'Kaydet',
        'save_and_close' => 'Kaydet ve kapat',
        'save_and_create' => 'Kaydet ve oluştur',
        'cancel' => 'İptal',
        'download' => 'İndir',
        'all' => 'Tümü',
        'processing' => '<i class="fas fa-spinner fa-5x fa-spin"></i>',
        'loadingRecords' => 'Yükleniyor...',
        'lengthMenu' => '_MENU_ öğe görüntüle',
        'zeroRecords' => 'Eşleşen kayıt bulunamadı.',
        'info' => '_START_ - _END_ arası _TOTAL_ kayıt görüntüleniyor',
        'infoEmpty' => '0 - 0 arası 0 kayıt görüntüleniyor',
        'infoFiltered' => '(toplam _MAX_ kayıttan filtrelendi)',
        'infoThousands' => ',',
        'infoPostFix' => '',
        'search' => 'Ara: ',
        'emptyTable' => 'Tabloda veri yok',
        'paginate' => [
            'first' => 'İlk',
            'previous' => '&larr;',
            'next' => '&rarr;',
            'last' => 'Son',
        ],
    ],
    'editable' => [
        'checkbox' => [
            'checked' => 'Evet',
            'unchecked' => 'Hayır',
        ],
    ],
    'select' => [
        'nothing' => 'Seçili öğe yok',
        'selected' => 'seçili',
        'placeholder' => 'Listeden seç',
    ],
    'image' => [
        'browse' => 'Resim Seç',
        'browseMultiple' => 'Resimleri Seç',
        'remove' => 'Resmi Kaldır',
        'removeMultiple' => 'Kaldır',
    ],
    'file' => [
        'browse' => 'Dosya Seç',
        'remove' => 'Dosyayı Kaldır',
    ],
    'message' => [
        'created' => '<i class="fas fa-check fa-lg"></i> Kayıt başarıyla oluşturuldu',
        'updated' => '<i class="fas fa-check fa-lg"></i> Kayıt başarıyla güncellendi',
        'deleted' => '<i class="fas fa-check fa-lg"></i> Kayıt başarıyla silindi',
        'destroyed' => '<i class="fas fa-check fa-lg"></i> Kayıt başarıyla yok edildi',
        'restored' => '<i class="fas fa-check fa-lg"></i> Kayıt başarıyla geri alındı',
    ],
];
