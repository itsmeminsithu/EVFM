document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll('input[name="evm_js_check"]').forEach(function (input) {
    input.value = "1";
  });
  const toggle = document.querySelector(".mobile-menu-toggle");
  const nav = document.querySelector(".primary-nav");

  if (toggle && nav) {
    toggle.addEventListener("click", function () {
      const open = nav.classList.toggle("is-open");
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
    });
  }

  const tabButtons = Array.from(document.querySelectorAll(".booking-tab"));
  const bookingForms = Array.from(document.querySelectorAll(".booking-form"));
  const bookingServiceSelect = document.querySelector(".booking-service-select");

  function activateTab(tabName, updateUrl = false) {
    if (!tabName) return;
    const form = document.getElementById(tabName);
    const button = tabButtons.find((item) => item.getAttribute("data-tab") === tabName);
    if (!form || !button) return;

    tabButtons.forEach(function (btn) {
      btn.classList.remove("active");
      btn.setAttribute("aria-selected", "false");
    });

    bookingForms.forEach(function (formItem) {
      formItem.classList.remove("active");
    });

    button.classList.add("active");
    button.setAttribute("aria-selected", "true");
    form.classList.add("active");

    if (bookingServiceSelect && bookingServiceSelect.value !== tabName) {
      bookingServiceSelect.value = tabName;
    }

    document.querySelectorAll(".booking-service-panel").forEach(function (panel) {
      panel.classList.toggle("active", panel.getAttribute("data-booking-info") === tabName);
    });

    document.querySelectorAll(".booking-faq-panel").forEach(function (panel) {
      panel.classList.toggle("active", panel.getAttribute("data-booking-faq") === tabName);
    });

    if (updateUrl && window.history && window.history.replaceState) {
      const url = new URL(window.location.href);
      url.searchParams.set("tab", tabName);
      url.hash = "booking";
      window.history.replaceState({}, "", url.toString());
    }
  }

  tabButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      const tabName = button.getAttribute("data-tab");
      activateTab(tabName, true);
    });
  });

  if (bookingServiceSelect) {
    bookingServiceSelect.addEventListener("change", function () {
      activateTab(bookingServiceSelect.value, true);
    });
  }

  const requestedTab = new URLSearchParams(window.location.search).get("tab");
  const hash = window.location.hash.replace("#", "");
  const supportedTabs = ["flight", "hotel", "easy-pass", "easy-extension", "letter-service", "tm30-service"];
  if (supportedTabs.includes(requestedTab)) {
    activateTab(requestedTab, false);
  } else if (supportedTabs.includes(hash)) {
    activateTab(hash, false);
  }

  document.querySelectorAll('a[href*="tab=flight"], a[href*="tab=hotel"], a[href*="tab=easy-pass"], a[href*="tab=easy-extension"], a[href*="tab=letter-service"], a[href*="tab=tm30-service"]').forEach(function (link) {
    link.addEventListener('click', function () {
      const href = link.getAttribute('href') || '';
      const match = href.match(/tab=(flight|hotel|easy-pass|easy-extension|letter-service|tm30-service)/);
      if (match) {
        activateTab(match[1], false);
      }
    });
  });
const contactToggle = document.querySelector(".floating-contact-toggle");
  const contactWidget = document.querySelector(".floating-contact-widget");
  const contactPanel = document.querySelector(".floating-contact-panel");

  if (contactToggle && contactWidget && contactPanel) {
    contactToggle.addEventListener("click", function () {
      const isOpen = contactWidget.classList.toggle("is-open");
      contactToggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
      contactPanel.hidden = !isOpen;
    });

    document.addEventListener("click", function (event) {
      if (!contactWidget.contains(event.target)) {
        contactWidget.classList.remove("is-open");
        contactToggle.setAttribute("aria-expanded", "false");
        contactPanel.hidden = true;
      }
    });

    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape") {
        contactWidget.classList.remove("is-open");
        contactToggle.setAttribute("aria-expanded", "false");
        contactPanel.hidden = true;
      }
    });
  }


  const heroSlider = document.querySelector(".hero-slider");

  if (heroSlider) {
    const slides = Array.from(heroSlider.querySelectorAll(".hero-slide"));
    const dots = Array.from(heroSlider.querySelectorAll(".hero-slider-dot"));
    const prevBtn = heroSlider.querySelector(".hero-slider-prev");
    const nextBtn = heroSlider.querySelector(".hero-slider-next");
    let currentIndex = slides.findIndex((slide) => slide.classList.contains("is-active"));
    if (currentIndex < 0) currentIndex = 0;
    let timer = null;

    function renderSlide(index) {
      slides.forEach((slide, i) => {
        slide.classList.toggle("is-active", i === index);
      });
      dots.forEach((dot, i) => {
        dot.classList.toggle("is-active", i === index);
        dot.setAttribute("aria-current", i === index ? "true" : "false");
      });
      currentIndex = index;
    }

    function goToSlide(index) {
      const nextIndex = (index + slides.length) % slides.length;
      renderSlide(nextIndex);
    }

    function startSlider() {
      if (slides.length < 2) return;
      stopSlider();
      timer = window.setInterval(function () {
        goToSlide(currentIndex + 1);
      }, 5000);
    }

    function stopSlider() {
      if (timer) {
        window.clearInterval(timer);
        timer = null;
      }
    }

    if (prevBtn) {
      prevBtn.addEventListener("click", function () {
        goToSlide(currentIndex - 1);
        startSlider();
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener("click", function () {
        goToSlide(currentIndex + 1);
        startSlider();
      });
    }

    dots.forEach(function (dot, index) {
      dot.addEventListener("click", function () {
        goToSlide(index);
        startSlider();
      });
    });

    heroSlider.addEventListener("mouseenter", stopSlider);
    heroSlider.addEventListener("mouseleave", startSlider);
    heroSlider.addEventListener("focusin", stopSlider);
    heroSlider.addEventListener("focusout", startSlider);

    renderSlide(currentIndex);
    startSlider();
  }
  // Hero slider end

  const cmsPopup = document.querySelector(".evm-popup");

  if (cmsPopup) {
    const popupCard = cmsPopup.querySelector(".evm-popup-card");
    const popupId = cmsPopup.getAttribute("data-popup-id") || "default";
    const frequency = cmsPopup.getAttribute("data-frequency") || "daily";
    const parsedDelay = parseInt(cmsPopup.getAttribute("data-delay") || "1200", 10);
    const delay = Number.isFinite(parsedDelay) ? parsedDelay : 1200;
    const isPreview = cmsPopup.getAttribute("data-preview") === "1";
    const storageKey = "evm_popup_" + popupId;
    const sessionKey = "evm_popup_session_" + popupId;

    function evmPopupTodayKey() {
      const now = new Date();
      return now.getFullYear() + "-" + (now.getMonth() + 1) + "-" + now.getDate();
    }

    function evmPopupShouldShow() {
      if (isPreview || frequency === "always") return true;

      try {
        if (frequency === "session") {
          return sessionStorage.getItem(sessionKey) !== "shown";
        }

        const stored = localStorage.getItem(storageKey);

        if (frequency === "once") {
          return stored !== "shown";
        }

        if (frequency === "daily") {
          return stored !== evmPopupTodayKey();
        }
      } catch (error) {
        return true;
      }

      return true;
    }

    function evmPopupMarkShown() {
      if (isPreview || frequency === "always") return;

      try {
        if (frequency === "session") {
          sessionStorage.setItem(sessionKey, "shown");
        } else if (frequency === "once") {
          localStorage.setItem(storageKey, "shown");
        } else {
          localStorage.setItem(storageKey, evmPopupTodayKey());
        }
      } catch (error) {}
    }

    function evmOpenPopup() {
      cmsPopup.hidden = false;
      cmsPopup.classList.add("is-visible");
      document.body.classList.add("evm-popup-open");
      evmPopupMarkShown();

      if (popupCard) {
        const focusable = popupCard.querySelector("button, a, input, select, textarea");
        if (focusable) {
          window.setTimeout(function () {
            focusable.focus();
          }, 80);
        }
      }
    }

    function evmClosePopup() {
      cmsPopup.hidden = true;
      cmsPopup.classList.remove("is-visible");
      document.body.classList.remove("evm-popup-open");
    }

    cmsPopup.querySelectorAll("[data-popup-close]").forEach(function (closeItem) {
      closeItem.addEventListener("click", evmClosePopup);
    });

    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape" && !cmsPopup.hidden) {
        evmClosePopup();
      }
    });

    if (evmPopupShouldShow()) {
      window.setTimeout(evmOpenPopup, delay);
    }
  }
  // CMS popup end



  const evmLanguageButtons = document.querySelectorAll(".evm-lang-btn");
  const evmTranslations = {
    "Easy Visa For Myanmar provides travel support and request coordination. We do not guarantee airline, hotel, immigration or visa approval decisions.": "Easy Visa For Myanmar သည် ခရီးသွားအကူအညီနှင့် တောင်းဆိုမှုညှိနှိုင်းမှုကို ပံ့ပိုးပါသည်။ လေကြောင်း၊ ဟိုတယ်၊ လူဝင်မှုကြီးကြပ်ရေး သို့မဟုတ် ဗီဇာအတည်ပြုမှုကို အာမခံမပေးပါ။",
    "Read common questions before submitting your request.": "တောင်းဆိုမှုမပေးပို့မီ မေးလေ့ရှိသောမေးခွန်းများကို ဖတ်ပါ။",
    "FAQ": "မေးလေ့ရှိသောမေးခွန်းများ",
    "I agree that Easy Visa For Myanmar can contact me about this request. I understand I should not send passport photos, ID cards, bank details or private documents through this form.": "ဤတောင်းဆိုမှုအတွက် Easy Visa For Myanmar မှ ဆက်သွယ်နိုင်သည်ကို သဘောတူပါသည်။ Passport ဓာတ်ပုံ၊ ID Card၊ ဘဏ်အချက်အလက် သို့မဟုတ် ကိုယ်ရေးကိုယ်တာစာရွက်စာတမ်းများကို ဤ form မှ မပို့သင့်ကြောင်း နားလည်ပါသည်။",
    "Email": "အီးမေးလ်",
    "Phone": "ဖုန်း",
    "Choose Contact Method": "ဆက်သွယ်ရန်နည်းလမ်း ရွေးပါ",
    "Preferred Contact Method": "ဆက်သွယ်ရန် နှစ်သက်သည့်နည်းလမ်း",
    "Start Booking": "ဘွတ်ကင် စတင်ရန်",
    "Start Booking →": "ဘွတ်ကင် စတင်ရန် →",
    "Start Request": "တောင်းဆိုမှု စတင်ရန်",
    "Start Request →": "တောင်းဆိုမှု စတင်ရန် →",
    "Book Travel": "ခရီးသွားဝန်ဆောင်မှု",
    "Book Travel & Services": "ခရီးသွားနှင့် ဝန်ဆောင်မှုများ",
    "Visa Guides": "ဗီဇာလမ်းညွှန်များ",
    "Support Email": "Support အီးမေးလ်",
    "Follow us": "ကျွန်ုပ်တို့ကို Follow လုပ်ပါ",
    "Contact Us": "ဆက်သွယ်ရန်",
    "About Us": "ကျွန်ုပ်တို့အကြောင်း",
    "Home": "ပင်မ",
    "Flights": "လေယာဉ်လက်မှတ်",
    "Hotels": "ဟိုတယ်",
    "Easy Pass": "Easy Pass",
    "Easy Extension": "Easy Extension",
    "Services": "ဝန်ဆောင်မှုများ",
    "Blog": "ဘလော့",
    "Guides": "လမ်းညွှန်များ",
    "Visa Guides / Blog": "ဗီဇာလမ်းညွှန် / ဘလော့",
    "Visa and service guides": "ဗီဇာနှင့် ဝန်ဆောင်မှုလမ်းညွှန်များ",
    "Contact": "ဆက်သွယ်ရန်",
    "Start Request →": "တောင်းဆိုမှု စတင်ရန် →",
    "Travel · Visa · Knowledge Sharing": "ခရီးသွား · ဗီဇာ · အသိပညာ",
    "Your Journey to Myanmar Starts Here": "မြန်မာခရီးစဉ်ကို ဒီနေရာမှ စတင်ပါ",
    "Visas made easy. Flights at the best prices. Comfortable stays. Local knowledge you can trust.": "ဗီဇာ၊ လေယာဉ်လက်မှတ်၊ ဟိုတယ် နှင့် ယုံကြည်ရသော ခရီးသွားအချက်အလက်များကို လွယ်ကူစွာ ရယူပါ။",
    "Start Request": "တောင်းဆိုမှု စတင်ရန်",
    "Explore Services": "ဝန်ဆောင်မှုများ ကြည့်ရန်",
    "Visa": "ဗီဇာ",
    "Simple application guides": "လွယ်ကူသော လမ်းညွှန်များ",
    "Travel knowledge sharing": "ခရီးသွား အသိပညာမျှဝေခြင်း",
    "Book Your Travel": "ခရီးသွားဝန်ဆောင်မှု ရွေးချယ်ရန်",
    "Choose Flight Ticket, Hotel Rent or Easy Pass. Your request will be saved and our team will contact you soon.": "လေယာဉ်လက်မှတ်၊ ဟိုတယ်၊ Easy Pass သို့မဟုတ် Easy Extension ကို ရွေးချယ်ပါ။ သင့်တောင်းဆိုမှုကို သိမ်းဆည်းပြီး ကျွန်ုပ်တို့အဖွဲ့မှ မကြာမီ ဆက်သွယ်ပါမည်။",
    "Choose travel requests or visa/support services. The form, details and FAQ will change for that service only.": "ခရီးသွားတောင်းဆိုမှုများ သို့မဟုတ် ဗီဇာ/အကူအညီဝန်ဆောင်မှုများကို ရွေးချယ်ပါ။ Form၊ အသေးစိတ်နှင့် FAQ များသည် ရွေးထားသောဝန်ဆောင်မှုအလိုက် ပြောင်းလဲပါမည်။",
    "Travel: Flight Ticket, Hotel Rent": "ခရီးသွား: လေယာဉ်လက်မှတ်၊ ဟိုတယ်",
    "Visa & Support: Easy Pass, Easy Extension, Letter Service, TM30": "ဗီဇာနှင့်အကူအညီ: Easy Pass၊ Easy Extension၊ Letter Service၊ TM30",
    "Helpful guides before customers submit a request": "Customer များတောင်းဆိုမှုမပေးပို့မီ ဖတ်ရန်လမ်းညွှန်များ",
    "View All Guides": "လမ်းညွှန်များအားလုံး ကြည့်ရန်",
    "Flight Ticket": "လေယာဉ်လက်မှတ်",
    "Hotel Rent": "ဟိုတယ်",
    "Easy Pass Services": "Easy Pass ဝန်ဆောင်မှု",
    "Name": "အမည်",
    "Phone / Email": "ဖုန်း / အီးမေးလ်",
    "From": "ထွက်ခွာရာ",
    "To": "သွားမည့်နေရာ",
    "Departure": "ထွက်ခွာမည့်ရက်",
    "Return": "ပြန်လာမည့်ရက်",
    "Passengers": "ခရီးသည်ဦးရေ",
    "Submit Flight Request": "လေယာဉ်လက်မှတ် တောင်းဆိုရန်",
    "Destination": "သွားမည့်မြို့",
    "Check-in": "ဝင်ရောက်မည့်ရက်",
    "Check-out": "ထွက်ခွာမည့်ရက်",
    "Guests": "ဧည့်သည်ဦးရေ",
    "Rooms": "အခန်းအရေအတွက်",
    "Submit Hotel Request": "ဟိုတယ် တောင်းဆိုရန်",
    "Nationality": "နိုင်ငံသား",
    "Arrive Airport": "ရောက်ရှိမည့် လေဆိပ်",
    "Visa Type": "ဗီဇာအမျိုးအစား",
    "Special Request / Notes": "အထူးတောင်းဆိုချက် / မှတ်ချက်",
    "Submit Easy Pass Request": "Easy Pass တောင်းဆိုရန်",
    "Submit Easy Extension Request": "Easy Extension တောင်းဆိုရန်",
    "Current Visa Type": "လက်ရှိဗီဇာအမျိုးအစား",
    "Visa Expiry Date": "ဗီဇာကုန်ဆုံးမည့်ရက်",
    "Preferred Extension Date": "တိုးချဲ့လိုသောရက်",
    "Extension Method": "တိုးချဲ့နည်းလမ်း",
    "Choose Method": "နည်းလမ်းရွေးချယ်ရန်",
    "Arrival Visa": "Arrival Visa",
    "TR Visa (Tourist)": "TR Visa (ခရီးသွား)",
    "e Extension": "e Extension",
    "Walk In VIP Extension": "Walk In VIP Extension",
    "Choose Service": "ဝန်ဆောင်မှု ရွေးချယ်ပါ",
    "Submit Details": "အချက်အလက် ဖြည့်ပါ",
    "Continue Chat": "ဆက်သွယ်မှု ဆက်လက်လုပ်ပါ",
    "Get Support": "အကူအညီ ရယူပါ",
    "How It Works": "လုပ်ငန်းစဉ်",
    "Simple steps for every traveler": "ခရီးသွားတိုင်းအတွက် လွယ်ကူသောအဆင့်များ",
    "Choose your service, submit your details, and continue with our team on Facebook or LINE.": "ဝန်ဆောင်မှုရွေးချယ်ပြီး အချက်အလက်ပို့ပါ။ ကျွန်ုပ်တို့အဖွဲ့မှ ဆက်သွယ်ပါမည်။",
    "Why Choose Us": "ဘာကြောင့် ကျွန်ုပ်တို့ကို ရွေးချယ်သင့်သလဲ",
    "Built for travelers who want simple support": "လွယ်ကူသော ခရီးသွားအကူအညီလိုသူများအတွက်",
    "Easy contact through Facebook, LINE, Instagram and TikTok": "Facebook, LINE, Instagram, TikTok မှ လွယ်ကူစွာ ဆက်သွယ်နိုင်သည်",
    "Traveler Trust": "ခရီးသွားယုံကြည်မှု",
    "Helpful support before your trip": "ခရီးမထွက်မီ အကူအညီ",
    "Before You Contact Us": "မဆက်သွယ်မီ ပြင်ဆင်ရန်",
    "Prepare basic travel details only": "အခြေခံခရီးသွားအချက်အလက်များသာ ပြင်ဆင်ပါ",
    "Supported Airports": "ထောက်ပံ့သော လေဆိပ်များ",
    "Easy Pass airport options": "Easy Pass လေဆိပ်ရွေးချယ်မှုများ",
    "Service Details": "ဝန်ဆောင်မှုအသေးစိတ်",
    "Choose a service to see details and FAQ": "အသေးစိတ်နှင့် FAQ ကြည့်ရန် ဝန်ဆောင်မှုရွေးချယ်ပါ",
    "Click one service. Only that service information will show.": "ဝန်ဆောင်မှုတစ်ခုကို နှိပ်ပါ။ ထိုဝန်ဆောင်မှုအချက်အလက်သာ ပြပါမည်။",
    "Flight": "လေယာဉ်",
    "Hotel": "ဟိုတယ်",
    "Flight Ticket Support": "လေယာဉ်လက်မှတ် အကူအညီ",
    "Hotel Rent Support": "ဟိုတယ် အကူအညီ",
    "Flight FAQ": "လေယာဉ် FAQ",
    "Hotel FAQ": "ဟိုတယ် FAQ",
    "Easy Pass FAQ": "Easy Pass FAQ",
    "Easy Extension FAQ": "Easy Extension FAQ",
    "General FAQ": "အထွေထွေ FAQ",
    "After you submit a request": "တောင်းဆိုမှု ပေးပို့ပြီးနောက်",
    "What happens after I submit?": "ပေးပို့ပြီးနောက် ဘာဖြစ်မလဲ?",
    "Your data is saved in the CMS as an inquiry. The support team receives an email reminder and will contact you soon.": "သင့်အချက်အလက်ကို CMS ထဲတွင် Inquiry အဖြစ် သိမ်းဆည်းပါမည်။ Support အဖွဲ့သို့ အီးမေးလ်သတိပေးချက် ပို့ပြီး မကြာမီ ဆက်သွယ်ပါမည်။",
    "Do I need to send private documents here?": "ကိုယ်ရေးကိုယ်တာစာရွက်စာတမ်းများကို ဒီနေရာမှာ ပို့ရမလား?",
    "No. Do not send passport photos, ID cards, bank details or sensitive documents through normal website forms.": "မပို့ပါနှင့်။ Passport ဓာတ်ပုံ၊ ID Card၊ ဘဏ်အချက်အလက်များကို website form မှ မပို့ပါနှင့်။",
    "Where can admin see the request?": "Admin က တောင်းဆိုမှုကို ဘယ်မှာ ကြည့်နိုင်မလဲ?",
    "Admin can see every request in WordPress Admin → Inquiries.": "Admin သည် WordPress Admin → Inquiries တွင် တောင်းဆိုမှုများကို ကြည့်နိုင်ပါသည်။",
    "Request Received": "တောင်းဆိုမှု လက်ခံပြီးပါပြီ",
    "Thank you. We will contact you soon.": "ကျေးဇူးတင်ပါသည်။ မကြာမီ ဆက်သွယ်ပါမည်။",
    "Back to Home": "ပင်မသို့ ပြန်သွားရန်",
    "Quick Links": "အမြန်လင့်များ",
    "Help & Support": "အကူအညီ",
    "Privacy Policy": "ကိုယ်ရေးအချက်အလက် မူဝါဒ",
    "Terms & Conditions": "စည်းမျဉ်းများ",
    "Facebook": "Facebook",
    "Instagram": "Instagram",
    "TikTok": "TikTok",
    "LINE": "LINE",
    "Read more": "ဆက်လက်ဖတ်ရှုရန်",
    "Search": "ရှာဖွေရန်",
    "Search...": "ရှာဖွေရန်...",
    "Your full name": "အမည်အပြည့်အစုံ",
    "Phone or email": "ဖုန်း သို့မဟုတ် အီးမေးလ်",
    "City / Country": "မြို့ / နိုင်ငံ",
    "Select Visa Type": "ဗီဇာအမျိုးအစား ရွေးချယ်ပါ",
    "Select Current Visa": "လက်ရှိဗီဇာ ရွေးချယ်ပါ",
    "Example: arrival time, family members, urgent request, preferred contact time...": "ဥပမာ - ရောက်ရှိချိန်၊ မိသားစုဝင်များ၊ အရေးပေါ်တောင်းဆိုချက်၊ ဆက်သွယ်ရန်အချိန်...",
    "Example: visa expires soon, urgent extension, preferred date, question for admin...": "ဥပမာ - ဗီဇာမကြာမီကုန်ဆုံးမည်၊ အရေးပေါ်တိုးချဲ့မှု၊ ရက်ရွေးချယ်မှု၊ admin ကို မေးလိုသောအချက်..."
};
  const evmOriginalText = new WeakMap();

  function evmCleanText(value) {
    return (value || "").replace(/\s+/g, " ").trim();
  }

  function evmTranslateTextValue(value, lang) {
    const clean = evmCleanText(value);
    if (!clean) return value;

    if (lang === "my" && evmTranslations[clean]) {
      return value.replace(clean, evmTranslations[clean]);
    }

    return value;
  }

  function evmSetLanguage(lang) {
    const walker = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT, {
      acceptNode: function (node) {
        const parent = node.parentElement;
        if (!parent) return NodeFilter.FILTER_REJECT;
        const tag = parent.tagName;
        if (["SCRIPT", "STYLE", "NOSCRIPT", "TEXTAREA"].includes(tag)) return NodeFilter.FILTER_REJECT;
        if (parent.closest(".wpadminbar")) return NodeFilter.FILTER_REJECT;
        if (!evmCleanText(node.nodeValue)) return NodeFilter.FILTER_REJECT;
        return NodeFilter.FILTER_ACCEPT;
      }
    });

    const textNodes = [];
    while (walker.nextNode()) {
      textNodes.push(walker.currentNode);
    }

    textNodes.forEach(function (node) {
      if (!evmOriginalText.has(node)) {
        evmOriginalText.set(node, node.nodeValue);
      }
      const original = evmOriginalText.get(node);
      node.nodeValue = lang === "my" ? evmTranslateTextValue(original, "my") : original;
    });

    document.querySelectorAll("[placeholder]").forEach(function (el) {
      if (!el.dataset.evmOriginalPlaceholder) {
        el.dataset.evmOriginalPlaceholder = el.getAttribute("placeholder") || "";
      }
      const original = el.dataset.evmOriginalPlaceholder;
      el.setAttribute("placeholder", lang === "my" ? evmTranslateTextValue(original, "my") : original);
    });

    document.querySelectorAll("[aria-label]").forEach(function (el) {
      if (!el.dataset.evmOriginalAriaLabel) {
        el.dataset.evmOriginalAriaLabel = el.getAttribute("aria-label") || "";
      }
      const original = el.dataset.evmOriginalAriaLabel;
      el.setAttribute("aria-label", lang === "my" ? evmTranslateTextValue(original, "my") : original);
    });

    document.documentElement.setAttribute("lang", lang === "my" ? "my-MM" : "en");
    document.body.classList.toggle("evm-lang-my", lang === "my");

    evmLanguageButtons.forEach(function (button) {
      const active = button.getAttribute("data-evm-lang") === lang;
      button.classList.toggle("active", active);
      button.setAttribute("aria-pressed", active ? "true" : "false");
    });

    try {
      localStorage.setItem("evm_language", lang);
    } catch (error) {}
  }

  evmLanguageButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      evmSetLanguage(button.getAttribute("data-evm-lang") || "en");
    });
  });

  let evmInitialLanguage = "en";
  try {
    evmInitialLanguage = localStorage.getItem("evm_language") || "en";
  } catch (error) {}

  const evmUrlLanguage = new URLSearchParams(window.location.search).get("lang");
  if (evmUrlLanguage === "my" || evmUrlLanguage === "en") {
    evmInitialLanguage = evmUrlLanguage;
  }

  evmSetLanguage(evmInitialLanguage);
  // EVM language switcher end

});
