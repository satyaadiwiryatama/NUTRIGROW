@extends('layouts.app')
@section('title', 'Konseling Gizi')
@section('content')
@include('partials.pagehead', ['title' => 'Konseling & Tanya Jawab Gizi'])

<div class="w in">
    {{-- Header Pengantar & Tombol Aksi --}}
    <div class="q-topbar">
        <div class="q-filters" role="tablist">
            <button class="q-filter-btn active" data-filter="all">Semua Topik</button>
            <button class="q-filter-btn" data-filter="Ibu Hamil">Ibu Hamil</button>
            <button class="q-filter-btn" data-filter="Ibu Menyusui">Ibu Menyusui</button>
            <button class="q-filter-btn" data-filter="MPASI">MPASI</button>
        </div>
        <button class="btn q-ask-btn" id="btn-toggle-ask">Ajukan Pertanyaan Baru</button>
    </div>

    {{-- Form Ajukan Pertanyaan Baru (Collapsible Dummy) --}}
    <div class="card q-ask-card" id="ask-card" style="display:none;">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;">
            <h3 style="margin:0;font-size:20px;font-family:'Nunito Sans',sans-serif;font-weight:700;">Tulis Pertanyaan / Konsultasi Gizi</h3>
            <button class="ib" id="btn-close-ask" style="width:32px;height:32px;font-size:16px;">✕</button>
        </div>
        <form id="form-ask">
            <div class="q-form-row">
                <div class="q-form-group">
                    <label>Nama Anda</label>
                    <input type="text" id="ask-name" required placeholder="Contoh: Bunda Dian">
                </div>
                <div class="q-form-group">
                    <label>Kategori</label>
                    <select id="ask-category" required>
                        <option value="Ibu Hamil">Ibu Hamil</option>
                        <option value="Ibu Menyusui">Ibu Menyusui</option>
                        <option value="MPASI">MPASI</option>
                    </select>
                </div>
            </div>
            <div class="q-form-group">
                <label>Judul Pertanyaan</label>
                <input type="text" id="ask-title" required placeholder="Tuliskan inti masalah gizi yang ingin ditanyakan...">
            </div>
            <div class="q-form-group">
                <label>Detail Pertanyaan / Kondisi</label>
                <textarea id="ask-body" rows="4" required placeholder="Jelaskan usia kehamilan/anak, keluhan yang dialami, pola makan saat ini, dll..."></textarea>
            </div>
            <div style="text-align:right;margin-top:16px;">
                <button type="submit" class="btn">Kirim Pertanyaan</button>
            </div>
        </form>
    </div>

    {{-- Daftar Pertanyaan (Feed Q&A) --}}
    <div class="q-feed" id="q-feed">
        @foreach($konseling as $item)
            <article class="card q-card" data-category="{{ $item['category'] }}" id="q-card-{{ $item['id'] }}">
                {{-- Header Item --}}
                <div class="q-header">
                    <div class="q-avatar" style="background-color:{{ $item['avatar_color'] }}">
                        {{ strtoupper(substr($item['author'], 0, 1)) }}
                    </div>
                    <div class="q-meta">
                        <div class="q-author">{{ $item['author'] }}</div>
                        <div class="q-meta-sub">{{ $item['date'] }}</div>
                    </div>
                </div>

                {{-- Judul Pertanyaan (Mudah dibaca) --}}
                <h3 class="q-title">{{ $item['title'] }}</h3>

                {{-- Body tanpa Vote & tanpa Tag --}}
                <div class="q-main">
                    <p class="q-body-text">{{ $item['body'] }}</p>
                </div>

                {{-- Bottom Action Bar (Tanpa Emote) --}}
                <div class="q-actionbar">
                    <div class="q-action-left">
                        <button class="q-metric-btn btn-toggle-replies" data-target="replies-{{ $item['id'] }}">
                            <span class="replies-num">{{ count($item['replies']) }}</span> Jawaban
                        </button>
                        <span class="q-metric">{{ $item['views'] }} Dilihat</span>
                    </div>
                    <button class="q-answer-btn btn-open-reply" data-target="replies-{{ $item['id'] }}">
                        Balas
                    </button>
                </div>

                {{-- Bagian Balasan / Replies dengan Profil Penjawab --}}
                <div class="q-replies-box" id="replies-{{ $item['id'] }}" style="display:none;">
                    <div class="q-replies-list">
                        @foreach($item['replies'] as $reply)
                            <div class="q-reply-item {{ !empty($reply['is_expert']) ? 'expert' : '' }}">
                                <div class="q-reply-avatar" style="background-color:{{ !empty($reply['is_expert']) ? '#2f5d57' : '#8c6a3a' }}">
                                    {{ strtoupper(substr($reply['author'], 0, 1)) }}
                                </div>
                                <div class="q-reply-body">
                                    <div class="q-reply-head">
                                        <span class="q-reply-author">{{ $reply['author'] }}</span>
                                        @if(!empty($reply['is_expert']))
                                            <span class="q-expert-badge">Konselor Gizi</span>
                                        @endif
                                        <span class="q-reply-date">{{ $reply['date'] }}</span>
                                    </div>
                                    <p class="q-reply-text">{{ $reply['text'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Form Balas --}}
                    <form class="q-reply-form" data-card-id="{{ $item['id'] }}">
                        <div style="display:grid;gap:10px;">
                            <input type="text" class="reply-name-input" required placeholder="Nama Anda (Bunda / Konselor)">
                            <textarea class="reply-text-input" rows="2" required placeholder="Tuliskan jawaban atau saran Anda..."></textarea>
                            <div style="text-align:right;">
                                <button type="submit" class="btn" style="padding:8px 20px;font-size:14px;">Kirim Balasan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </article>
        @endforeach
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    function escapeHtml(str) {
        if (!str) return '';
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    // 1. Filter Kategori
    const filterBtns = document.querySelectorAll('.q-filter-btn');
    const cards = document.querySelectorAll('.q-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const cat = this.getAttribute('data-filter');

            cards.forEach(card => {
                if (cat === 'all' || card.getAttribute('data-category') === cat) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // 2. Toggle Form Pertanyaan Baru
    const askCard = document.getElementById('ask-card');
    const btnToggleAsk = document.getElementById('btn-toggle-ask');
    const btnCloseAsk = document.getElementById('btn-close-ask');

    btnToggleAsk.addEventListener('click', function () {
        askCard.style.display = askCard.style.display === 'none' ? 'block' : 'none';
        if (askCard.style.display === 'block') {
            askCard.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
    });

    btnCloseAsk.addEventListener('click', function () {
        askCard.style.display = 'none';
    });

    // 3. Submit Pertanyaan Baru (Dummy prepend to feed)
    const formAsk = document.getElementById('form-ask');
    formAsk.addEventListener('submit', function (e) {
        e.preventDefault();
        const name = escapeHtml(document.getElementById('ask-name').value.trim());
        const category = escapeHtml(document.getElementById('ask-category').value.trim());
        const title = escapeHtml(document.getElementById('ask-title').value.trim());
        const body = escapeHtml(document.getElementById('ask-body').value.trim());
        const newId = Date.now();

        const newArticle = document.createElement('article');
        newArticle.className = 'card q-card';
        newArticle.setAttribute('data-category', category);
        newArticle.id = 'q-card-' + newId;

        newArticle.innerHTML = `
            <div class="q-header">
                <div class="q-avatar" style="background-color:#2f5d57">
                    ${name.charAt(0).toUpperCase()}
                </div>
                <div class="q-meta">
                    <div class="q-author">${name}</div>
                    <div class="q-meta-sub">Baru saja</div>
                </div>
            </div>
            <h3 class="q-title">${title}</h3>
            <div class="q-main">
                <p class="q-body-text">${body}</p>
            </div>
            <div class="q-actionbar">
                <div class="q-action-left">
                    <button class="q-metric-btn btn-toggle-replies" data-target="replies-${newId}">
                        <span class="replies-num">0</span> Jawaban
                    </button>
                    <span class="q-metric">1 Dilihat</span>
                </div>
                <button class="q-answer-btn btn-open-reply" data-target="replies-${newId}">
                    Balas
                </button>
            </div>
            <div class="q-replies-box" id="replies-${newId}" style="display:none;">
                <div class="q-replies-list">
                    <p style="color:var(--mute);font-size:14px;margin:0 0 10px;">Belum ada jawaban. Jadilah yang pertama menjawab!</p>
                </div>
                <form class="q-reply-form" data-card-id="${newId}">
                    <div style="display:grid;gap:10px;">
                        <input type="text" class="reply-name-input" required placeholder="Nama Anda (Bunda / Konselor)">
                        <textarea class="reply-text-input" rows="2" required placeholder="Tuliskan jawaban atau saran Anda..."></textarea>
                        <div style="text-align:right;">
                            <button type="submit" class="btn" style="padding:8px 20px;font-size:14px;">Kirim Balasan</button>
                        </div>
                    </div>
                </form>
            </div>
        `;

        document.getElementById('q-feed').prepend(newArticle);
        formAsk.reset();
        askCard.style.display = 'none';
        attachCardListeners(newArticle);
    });

    // 4. Attach Listeners for Replies
    function attachCardListeners(card) {
        const toggleBtn = card.querySelector('.btn-toggle-replies');
        const answerBtn = card.querySelector('.btn-open-reply');
        const targetId = toggleBtn.getAttribute('data-target');
        const repliesBox = document.getElementById(targetId);

        function toggleReplies() {
            repliesBox.style.display = repliesBox.style.display === 'none' ? 'block' : 'none';
        }

        toggleBtn.addEventListener('click', toggleReplies);
        answerBtn.addEventListener('click', function () {
            repliesBox.style.display = 'block';
            const textarea = repliesBox.querySelector('textarea');
            if (textarea) textarea.focus();
        });

        // Reply form submit
        const replyForm = card.querySelector('.q-reply-form');
        if (replyForm) {
            replyForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const nameInput = replyForm.querySelector('.reply-name-input');
                const textInput = replyForm.querySelector('.reply-text-input');
                const nameVal = escapeHtml(nameInput.value.trim());
                const textVal = escapeHtml(textInput.value.trim());

                const repliesList = repliesBox.querySelector('.q-replies-list');
                const emptyNotice = repliesList.querySelector('p');
                if (emptyNotice) emptyNotice.remove();

                const newReplyItem = document.createElement('div');
                newReplyItem.className = 'q-reply-item';
                newReplyItem.innerHTML = `
                    <div class="q-reply-avatar" style="background-color:#8c6a3a">
                        ${nameVal.charAt(0).toUpperCase()}
                    </div>
                    <div class="q-reply-body">
                        <div class="q-reply-head">
                            <span class="q-reply-author">${nameVal}</span>
                            <span class="q-reply-date">Baru saja</span>
                        </div>
                        <p class="q-reply-text">${textVal}</p>
                    </div>
                `;
                repliesList.appendChild(newReplyItem);

                // Update count
                const countBadge = card.querySelector('.replies-num');
                countBadge.textContent = parseInt(countBadge.textContent, 10) + 1;

                replyForm.reset();
            });
        }
    }

    document.querySelectorAll('.q-card').forEach(attachCardListeners);
});
</script>
@endsection
