<x-filament-widgets::widget>
    <div style="background: linear-gradient(135deg, #486db3 0%, #2d4f8a 100%); border-radius: 16px; padding: 2px;">
        <div style="background: #1a1a2e; border-radius: 14px; padding: 32px;">

            <div style="display: flex; align-items: center; gap: 32px; flex-wrap: wrap;">

                {{-- Avatar --}}
                <div style="display: flex; flex-direction: column; align-items: center; gap: 12px; flex-shrink: 0;">
                    <div style="
                        width: 100px;
                        height: 100px;
                        border-radius: 50%;
                        background: linear-gradient(135deg, #486db3, #2d4f8a);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 2rem;
                        font-weight: 800;
                        color: white;
                        box-shadow: 0 0 0 4px #486db333, 0 8px 32px #486db355;
                        letter-spacing: 2px;
                    ">
                        {{ $this->getUserInitials() }}
                    </div>
                    <span style="
                        background: #486db322;
                        color: #486db3;
                        border: 1px solid #486db355;
                        padding: 4px 14px;
                        border-radius: 999px;
                        font-size: 0.72rem;
                        font-weight: 600;
                        letter-spacing: 1px;
                        text-transform: uppercase;
                        white-space: nowrap;
                    ">
                        {{ auth()->user()->job_title }}
                    </span>
                </div>

                {{-- Vertical Divider --}}
                <div style="width: 1px; height: 120px; background: linear-gradient(to bottom, transparent, #486db3, transparent); flex-shrink: 0;"></div>

                {{-- Info --}}
                <div style="flex: 1; min-width: 260px;">

                    {{-- Name + subtitle --}}
                    <div style="margin-bottom: 24px;">
                        <h2 style="font-size: 1.5rem; font-weight: 700; color: white; margin: 0 0 4px 0;">
                            {{ auth()->user()->name }}
                        </h2>
                        <p style="color: #486db3; font-size: 0.85rem; margin: 0; font-weight: 500; letter-spacing: 1px; text-transform: uppercase;">
                            Account Information
                        </p>
                    </div>

                    {{-- Info Grid --}}
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px;">

                        {{-- Email --}}
                        <div style="background: #486db311; border: 1px solid #486db333; border-radius: 12px; padding: 14px 16px; display: flex; align-items: center; gap: 12px;">
                            <div style="width: 36px; height: 36px; border-radius: 10px; background: #486db322; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <x-heroicon-o-envelope style="width:18px;height:18px;color:#486db3;" />
                            </div>
                            <div style="min-width: 0;">
                                <p style="color: #6b7280; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; margin: 0 0 2px 0; font-weight: 600;">Email</p>
                                <p style="color: white; font-size: 0.85rem; font-weight: 600; margin: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ auth()->user()->email }}
                                </p>
                            </div>
                        </div>

                        {{-- Phone --}}
                        <div style="background: #486db311; border: 1px solid #486db333; border-radius: 12px; padding: 14px 16px; display: flex; align-items: center; gap: 12px;">
                            <div style="width: 36px; height: 36px; border-radius: 10px; background: #486db322; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <x-heroicon-o-phone style="width:18px;height:18px;color:#486db3;" />
                            </div>
                            <div style="min-width: 0;">
                                <p style="color: #6b7280; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; margin: 0 0 2px 0; font-weight: 600;">Phone</p>
                                <p style="color: white; font-size: 0.85rem; font-weight: 600; margin: 0;">
                                    {{ auth()->user()->phone }}
                                </p>
                            </div>
                        </div>

                        {{-- Job Title --}}
                        <div style="background: #486db311; border: 1px solid #486db333; border-radius: 12px; padding: 14px 16px; display: flex; align-items: center; gap: 12px;">
                            <div style="width: 36px; height: 36px; border-radius: 10px; background: #486db322; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <x-heroicon-o-briefcase style="width:18px;height:18px;color:#486db3;" />
                            </div>
                            <div style="min-width: 0;">
                                <p style="color: #6b7280; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; margin: 0 0 2px 0; font-weight: 600;">Job Title</p>
                                <p style="color: white; font-size: 0.85rem; font-weight: 600; margin: 0;">
                                    {{ auth()->user()->job_title }}
                                </p>
                            </div>
                        </div>

                        {{-- Email Status --}}
                        <div style="background: #486db311; border: 1px solid #486db333; border-radius: 12px; padding: 14px 16px; display: flex; align-items: center; gap: 12px;">
                            <div style="width: 36px; height: 36px; border-radius: 10px; background: #486db322; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <x-heroicon-o-shield-check style="width:18px;height:18px;color:#486db3;" />
                            </div>
                            <div style="min-width: 0;">
                                <p style="color: #6b7280; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; margin: 0 0 4px 0; font-weight: 600;">Email Status</p>
                                @if(auth()->user()->email_verified_at)
                                    <span style="background: #16a34a22; color: #4ade80; border: 1px solid #16a34a44; padding: 2px 10px; border-radius: 999px; font-size: 0.75rem; font-weight: 600;">
                                        ✓ Verified
                                    </span>
                                @else
                                    <span style="background: #dc262622; color: #f87171; border: 1px solid #dc262644; padding: 2px 10px; border-radius: 999px; font-size: 0.75rem; font-weight: 600;">
                                        ✗ Not Verified
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-filament-widgets::widget>
