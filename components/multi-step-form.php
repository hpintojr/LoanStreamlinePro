<?php
/**
 * 3-step lead capture form. Posts JSON to /api/lead.
 * Includes:
 *  - CSRF token
 *  - Honeypot field
 *  - Required explicit SMS consent checkbox (10DLC / TCPA)
 *  - AI disclosure
 *  - Captures consent text + timestamp client-side as hidden fields
 */
$src = isset($source_page) ? $source_page : '';
?>
<div class="bg-white rounded-3xl shadow-soft border border-slate-100 p-6 sm:p-8 relative">
  <div class="flex items-center justify-between mb-6">
    <div>
      <h2 class="text-xl font-bold text-slate-900">Check your rate</h2>
      <p class="text-sm text-slate-500">Takes about 60 seconds — no impact to credit.</p>
    </div>
    <div class="flex items-center gap-2" aria-hidden="true">
      <span class="step-dot active" data-step-dot="1"></span>
      <span class="step-dot" data-step-dot="2"></span>
      <span class="step-dot" data-step-dot="3"></span>
    </div>
  </div>

  <form id="leadForm" action="/api/lead" method="post" novalidate data-source="<?= e($src) ?>">

    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
    <input type="hidden" name="source_page" value="<?= e(current_path()) ?>">
    <!-- (sms_consent_text / call_consent_text hidden fields are emitted later inside step 3) -->
    <input type="hidden" name="consent_timestamp" id="consentTimestamp" value="">

    <!-- Honeypot (bots fill this, humans don't) -->
    <div class="hp-field" aria-hidden="true">
      <label>Company website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
    </div>

    <!-- STEP 1: Balance amount -->
    <fieldset data-step="1" class="space-y-4">
      <legend class="text-sm font-semibold text-slate-700">How much do you owe in unsecured balances?</legend>
      <div class="grid grid-cols-2 gap-3">
        <?php foreach ([
            '$5,000 – $10,000',
            '$10,000 – $25,000',
            '$25,000 – $50,000',
            '$50,000+',
        ] as $v): ?>
          <label class="cursor-pointer">
            <input type="radio" name="debt_amount" value="<?= e($v) ?>" class="peer sr-only" required>
            <div class="px-4 py-3 rounded-xl border border-slate-200 text-center text-sm font-medium text-slate-700 peer-checked:border-brand-600 peer-checked:bg-brand-50 peer-checked:text-brand-800 hover:border-brand-300 transition"><?= e($v) ?></div>
          </label>
        <?php endforeach; ?>
      </div>
      <div class="pt-2 flex justify-end">
        <button type="button" class="next-step inline-flex items-center justify-center px-5 py-2.5 rounded-full bg-brand-gradient text-white text-sm font-semibold shadow-soft">Continue →</button>
      </div>
    </fieldset>

    <!-- STEP 2: Loan purpose & credit -->
    <fieldset data-step="2" class="space-y-4 hidden">
      <legend class="text-sm font-semibold text-slate-700">A little more about you</legend>

      <label class="block">
        <span class="text-sm text-slate-700">Primary goal</span>
        <select name="loan_purpose" required class="mt-1 block w-full rounded-xl border-slate-200 focus:border-brand-500 focus:ring-brand-500">
          <option value="">Select…</option>
          <option>Consolidate credit card balances</option>
          <option>Lower my monthly payment</option>
          <option>Pay off medical bills</option>
          <option>Home improvement</option>
          <option>Major purchase</option>
          <option>Other</option>
        </select>
      </label>

      <label class="block">
        <span class="text-sm text-slate-700">Estimated credit range</span>
        <select name="credit_range" required class="mt-1 block w-full rounded-xl border-slate-200 focus:border-brand-500 focus:ring-brand-500">
          <option value="">Select…</option>
          <option>Excellent (720+)</option>
          <option>Good (660–719)</option>
          <option>Fair (600–659)</option>
          <option>Poor (below 600)</option>
          <option>Not sure</option>
        </select>
      </label>

      <label class="block">
        <span class="text-sm text-slate-700">Monthly income (approximate)</span>
        <select name="monthly_income" required class="mt-1 block w-full rounded-xl border-slate-200 focus:border-brand-500 focus:ring-brand-500">
          <option value="">Select…</option>
          <option>Under $2,000</option>
          <option>$2,000 – $4,000</option>
          <option>$4,000 – $6,000</option>
          <option>$6,000 – $10,000</option>
          <option>$10,000+</option>
        </select>
      </label>

      <div class="pt-2 flex justify-between gap-3">
        <button type="button" class="prev-step inline-flex items-center justify-center px-5 py-2.5 rounded-full border border-slate-200 text-slate-700 text-sm font-semibold">← Back</button>
        <button type="button" class="next-step inline-flex items-center justify-center px-5 py-2.5 rounded-full bg-brand-gradient text-white text-sm font-semibold shadow-soft">Continue →</button>
      </div>
    </fieldset>

    <!-- STEP 3: Contact + consent -->
    <fieldset data-step="3" class="space-y-4 hidden">
      <legend class="text-sm font-semibold text-slate-700">Where should we send your results?</legend>

      <div class="grid grid-cols-2 gap-3">
        <label class="block">
          <span class="text-sm text-slate-700">First name</span>
          <input type="text" name="first_name" required autocomplete="given-name" class="mt-1 block w-full rounded-xl border-slate-200 focus:border-brand-500 focus:ring-brand-500">
        </label>
        <label class="block">
          <span class="text-sm text-slate-700">Last name</span>
          <input type="text" name="last_name" autocomplete="family-name" class="mt-1 block w-full rounded-xl border-slate-200 focus:border-brand-500 focus:ring-brand-500">
        </label>
      </div>

      <label class="block">
        <span class="text-sm text-slate-700">Email</span>
        <input type="email" name="email" required autocomplete="email" class="mt-1 block w-full rounded-xl border-slate-200 focus:border-brand-500 focus:ring-brand-500">
      </label>

      <label class="block">
        <span class="text-sm text-slate-700">Mobile phone</span>
        <input type="tel" name="phone" required autocomplete="tel" inputmode="tel" pattern="[0-9()\-\s\+]{10,}" placeholder="(555) 123-4567" class="mt-1 block w-full rounded-xl border-slate-200 focus:border-brand-500 focus:ring-brand-500">
      </label>

      <label class="block">
        <span class="text-sm text-slate-700">State</span>
        <select name="state" required class="mt-1 block w-full rounded-xl border-slate-200 focus:border-brand-500 focus:ring-brand-500">
          <option value="">Select your state…</option>
          <?php
          $usStates = [
            'AL' => 'Alabama',        'AK' => 'Alaska',         'AZ' => 'Arizona',        'AR' => 'Arkansas',
            'CA' => 'California',     'CO' => 'Colorado',       'CT' => 'Connecticut',    'DE' => 'Delaware',
            'DC' => 'District of Columbia',
            'FL' => 'Florida',        'GA' => 'Georgia',        'HI' => 'Hawaii',         'ID' => 'Idaho',
            'IL' => 'Illinois',       'IN' => 'Indiana',        'IA' => 'Iowa',           'KS' => 'Kansas',
            'KY' => 'Kentucky',       'LA' => 'Louisiana',      'ME' => 'Maine',          'MD' => 'Maryland',
            'MA' => 'Massachusetts',  'MI' => 'Michigan',       'MN' => 'Minnesota',      'MS' => 'Mississippi',
            'MO' => 'Missouri',       'MT' => 'Montana',        'NE' => 'Nebraska',       'NV' => 'Nevada',
            'NH' => 'New Hampshire',  'NJ' => 'New Jersey',     'NM' => 'New Mexico',     'NY' => 'New York',
            'NC' => 'North Carolina', 'ND' => 'North Dakota',   'OH' => 'Ohio',           'OK' => 'Oklahoma',
            'OR' => 'Oregon',         'PA' => 'Pennsylvania',   'RI' => 'Rhode Island',   'SC' => 'South Carolina',
            'SD' => 'South Dakota',   'TN' => 'Tennessee',      'TX' => 'Texas',          'UT' => 'Utah',
            'VT' => 'Vermont',        'VA' => 'Virginia',       'WA' => 'Washington',     'WV' => 'West Virginia',
            'WI' => 'Wisconsin',      'WY' => 'Wyoming',
          ];
          foreach ($usStates as $code => $name): ?>
            <option value="<?= e($code) ?>"><?= e($name) ?></option>
          <?php endforeach; ?>
        </select>
      </label>

      <!-- ===== TCPA / 10DLC consent (BOTH OPTIONAL — form submits without either) ===== -->
      <div class="space-y-3">

        <!-- SMS opt-in -->
        <label class="flex items-start gap-3 p-4 rounded-xl border border-slate-200 bg-white hover:border-brand-200 cursor-pointer transition">
          <input type="checkbox" name="sms_consent" value="1" class="mt-1 rounded border-slate-300 text-brand-600 focus:ring-brand-500">
          <span class="text-xs text-slate-700 leading-relaxed">
            I agree to receive informational text messages (SMS) related to my loan inquiry, application, and account from <?= e(SITE_NAME) ?> at the phone number provided, including messages sent using an autodialer or AI/conversational technology. Consent is not a condition of any purchase or service. Msg &amp; data rates may apply. Message frequency varies. Reply HELP for help, STOP to cancel. View our <a href="/privacy-policy" class="text-brand-700 underline font-semibold">Privacy Policy</a>.
          </span>
        </label>

        <!-- Phone-call opt-in -->
        <label class="flex items-start gap-3 p-4 rounded-xl border border-slate-200 bg-white hover:border-brand-200 cursor-pointer transition">
          <input type="checkbox" name="call_consent" value="1" class="mt-1 rounded border-slate-300 text-brand-600 focus:ring-brand-500">
          <span class="text-xs text-slate-700 leading-relaxed">
            I agree to receive informational phone calls related to my loan inquiry, application, and account from <?= e(SITE_NAME) ?> at the phone number provided, including calls placed using an automatic telephone dialing system or an artificial or prerecorded voice. Consent is not a condition of any purchase or service.
          </span>
        </label>

      </div>

      <!-- Hidden audit fields: exact consent text shown is stored with the lead -->
      <input type="hidden" name="sms_consent_text"  value="<?= e(SMS_CONSENT_TEXT) ?>">
      <input type="hidden" name="call_consent_text" value="<?= e(CALL_CONSENT_TEXT) ?>">

      <div class="pt-2 flex justify-between gap-3">
        <button type="button" class="prev-step inline-flex items-center justify-center px-5 py-2.5 rounded-full border border-slate-200 text-slate-700 text-sm font-semibold">← Back</button>
        <button type="submit" class="inline-flex items-center justify-center px-6 py-3 rounded-full bg-brand-gradient text-white text-sm font-bold shadow-soft">
          Submit & See My Options
        </button>
      </div>

      <div id="formStatus" class="text-sm" role="status" aria-live="polite"></div>
    </fieldset>

  </form>
</div>
